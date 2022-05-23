<?php

namespace App\Http\Livewire\Admin;

use App\Library\Utilities;
use App\Models\ContactUs as ContactUsModel;
use App\Models\Awards as AwardsModel;
use App\Models\Blog as BlogModel;
use App\Models\Warranty as WarrantyModel;
use Carbon\Carbon;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class Dashboard extends Component
{
    public $firstRun = true;

    protected $listeners = [
        'onPointClick'  => 'handleOnPointClick',
        'onSliceClick'  => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'initDashboardCount',
    ];

    public $aCount = [
        'contact_us'     => 0,
        'warranty_claim' => 0,
        'blog'           => 0,
        'awards'         => 0,
    ];

    public function render()
    {
        $oPieChartContactUs = $this->createPieContactUs();
        $oPieChartWarrantyClaim = $this->createPieWarrantyClaim();
        $oLineChartPrevMonth = $this->createLinePrevMonth();
        $oLineChartPrevMonthVisits = $this->createLinePrevMonthVisits();
        $this->initDashboardCount();
        $this->firstRun = false;
        return view('livewire.admin.dashboard')
            ->with([
                'oPieChartContactUs'        => $oPieChartContactUs,
                'oPieChartWarrantyClaim'    => $oPieChartWarrantyClaim,
                'oLineChartPrevMonth'       => $oLineChartPrevMonth,
                'oLineChartPrevMonthVisits' => $oLineChartPrevMonthVisits,

            ]);
    }

    public function initDashboardCount()
    {
        $this->aCount = [
            'contact_us'     => ContactUsModel::all()->count(),
            'warranty_claim' => WarrantyModel::all()->count(),
            'blog'           => BlogModel::all()->where('is_active', true)->count(),
            'awards'         => AwardsModel::all()->where('is_active', true)->count(),
        ];
    }

    private function createLinePrevMonth()
    {
        return collect(range(Carbon::now()->daysInMonth, 0))->reduce(function (LineChartModel $oLineChartModel, $iDay) {
            $oDateToday = Carbon::now()->subDays($iDay)->format('Y-m-d');
            $iCountContactUs = ContactUsModel::whereDate('created_at', $oDateToday)->count();
            $iCountWarrantyClaim = WarrantyModel::whereDate('created_at', $oDateToday)->count();
            $iCountBlog = BlogModel::whereDate('created_at', $oDateToday)->count();
            $iCountAwards = AwardsModel::whereDate('created_at', $oDateToday)->count();
            if ($iCountContactUs <= 0 && $iCountWarrantyClaim <= 0 && $iCountBlog <= 0 && $iCountAwards <= 0) {
                return $oLineChartModel;
            }
            $oLineChartModel->addSeriesPoint('Contact Us', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountContactUs);
            $oLineChartModel->addSeriesPoint('Warranty Claim', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountWarrantyClaim);
            $oLineChartModel->addSeriesPoint('Blog Published', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountBlog);
            $oLineChartModel->addSeriesPoint('Added Awards', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountBlog);
            return $oLineChartModel;
        }, (new LineChartModel())
            ->setTitle('Total Count of Activities on Previous Month')
            ->multiLine()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve());
    }

    private function createLinePrevMonthVisits()
    {
        return collect(range(Carbon::now()->daysInMonth, 0))->reduce(function (LineChartModel $oLineChartModel, $iDay) {
            $sDateToday = Carbon::now()->subDays($iDay)->format('Y-m-d');
            $aWebsiteInfo = collect(Utilities::getDataInJson('website_visit', 'website_interaction.json'))
                                ->filter(function ($aItem) use ($sDateToday) {
                                    return Carbon::createFromDate($aItem['created_at'])->format('Y-m-d') === $sDateToday;
                                });
            $iCountHome = $aWebsiteInfo->where('route', '/')->count();
            $iCountProcess = $aWebsiteInfo->where('route', 'process')->count();
            $iCountProjects = $aWebsiteInfo->where('route', 'projects')->count();
            $iCountBlog = $aWebsiteInfo->where('route', 'blog')->count();
            $iCountContactUs = $aWebsiteInfo->where('route', 'contact-us')->count();
            $iCountWarranty = $aWebsiteInfo->where('route', 'warranty')->count();
            $iCountCareers = $aWebsiteInfo->where('route', 'careers')->count();
            $iCountPayments = $aWebsiteInfo->where('route', 'payments')->count();
            if ($iCountHome <= 0 && $iCountProcess <= 0 && $iCountProjects <= 0 && $iCountBlog <= 0 && $iCountContactUs <= 0 && $iCountWarranty <= 0 && $iCountCareers <= 0 && $iCountPayments <= 0) {
                return $oLineChartModel;
            }
            $oLineChartModel->addSeriesPoint('Home', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountHome);
            $oLineChartModel->addSeriesPoint('Track Progress', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountProcess);
            $oLineChartModel->addSeriesPoint('Projects', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountProjects);
            $oLineChartModel->addSeriesPoint('Blog', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountBlog);
            $oLineChartModel->addSeriesPoint('Contact-us', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountContactUs);
            $oLineChartModel->addSeriesPoint('Warranty Claim', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountWarranty);
            $oLineChartModel->addSeriesPoint('Careers', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountCareers);
            $oLineChartModel->addSeriesPoint('Payments', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountPayments);
            return $oLineChartModel;
        }, (new LineChartModel())
            ->setTitle('Total Count of Website Visits on Previous Month')
            ->multiLine()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve());
    }

    private function createPieWarrantyClaim()
    {
        $aWarrantyData = WarrantyModel::all();
        $aWarrantyChartDataColor = [
            'was_resolved'      => '#66DA26',
            'was_contacted'     => '#0000FF',
            'not_yet_resolved'  => '#FFA500',
            'not_yet_contacted' => '#FA8072',
        ];
        return collect($aWarrantyChartDataColor)->reduce(function (PieChartModel $oPieChartModel, $oData, $mKey) use ($aWarrantyChartDataColor, $aWarrantyData) {
            $mValue = 0;
            switch ($mKey) {
                case 'was_resolved' :
                    $mValue = $aWarrantyData->whereNotNull('was_resolved')->count();
                    break;
                case 'was_contacted' :
                    $mValue = $aWarrantyData->whereNotNull('was_contacted')->count();
                    break;
                case 'not_yet_resolved' :
                    $mValue = $aWarrantyData->whereNull('was_resolved')->count();
                    break;
                case 'not_yet_contacted' :
                    $mValue = $aWarrantyData->whereNull('was_contacted')->count();
                    break;
            }
            return $oPieChartModel->addSlice(ucwords(str_replace('_', ' ', $mKey)), $mValue, $aWarrantyChartDataColor[$mKey]);
        }, (new PieChartModel())
            ->setTitle('Warranty Claim Count if Was Released or Was Contacted')
            ->setAnimated($this->firstRun)
//            ->withOnSliceClickEvent('onSliceClick')
        );
    }

    private function createPieContactUs()
    {
        $aContactUsData = ContactUsModel::all();
        return $aContactUsData->groupBy('project_description')
            ->reduce(function (PieChartModel $oPieChartModel, $oData) {
                $aColor = [
                    'landscape'                 => '#66DA26',
                    'maintenance-and-turf-care' => '#f6ad55',
                ];
                $mKey = $oData->first()->project_description;
                $mValue = $oData->where('project_description', $mKey)->count();
                return $oPieChartModel->addSlice(ucwords(str_replace('-', ' ', $mKey)), $mValue, $aColor[$mKey]);
            }, (new PieChartModel())
                ->setTitle('Contact Us By Project Description')
                ->setAnimated($this->firstRun)
//                ->withOnSliceClickEvent('onSliceClick')
            );
    }
}
