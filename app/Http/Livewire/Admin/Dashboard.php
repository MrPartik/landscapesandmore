<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactUs as ContactUsModel;
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
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];
    public function handleOnPointClick($point)
    {
        dd($point);
    }
    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }
    public function handleOnColumnClick($column)
    {
        dd($column);
    }
    public function render()
    {
        $oPieChartContactUs = $this->createPieContactUs();
        $oPieChartWarrantyClaim = $this->createPieWarrantyClaim();
        $oLineChartPrevMonth = $this->createLinePrevMonth();
        $this->firstRun = false;
        return view('livewire.admin.dashboard')
            ->with([
                'oPieChartContactUs'     => $oPieChartContactUs,
                'oPieChartWarrantyClaim' => $oPieChartWarrantyClaim,
                'oLineChartPrevMonth' => $oLineChartPrevMonth
            ]);
    }
    private function createLinePrevMonth()
    {
        return collect(range(Carbon::now()->daysInMonth, 0))->reduce(function (LineChartModel $oLineChartModel, $iDay) {
                $oDateToday = Carbon::now()->subDays($iDay)->format('Y-m-d');
                $iCountContactUs = ContactUsModel::whereDate('created_at', $oDateToday)->count();
                $iCountWarrantyClaim = WarrantyModel::whereDate('created_at', $oDateToday)->count();
                $iCountBlog = BlogModel::whereDate('created_at', $oDateToday)->count();
                if ($iCountContactUs <= 0 && $iCountWarrantyClaim <= 0 && $iCountBlog <= 0) {
                    return $oLineChartModel;
                }
                $oLineChartModel->addSeriesPoint('Contact Us', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountContactUs);
                $oLineChartModel->addSeriesPoint('Warranty Claim', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountWarrantyClaim);
                $oLineChartModel->addSeriesPoint('Blog Published', Carbon::now()->subDays($iDay)->format('M, d, Y'), $iCountBlog);
                return $oLineChartModel;
            }, (new LineChartModel())
            ->setTitle('Total Count of Activities on Previous Month')
            ->multiLine()
            ->setAnimated($this->firstRun)
            ->setSmoothCurve());
    }

    private function createPieWarrantyClaim()
    {
        $aWarrantyData = WarrantyModel::all();
        $aWarrantyChartDataColor = [
            'was_resolved'  => '#66DA26',
            'was_contacted' => '#0000FF',
            'not_yet_resolved'  => '#FFA500',
            'not_yet_contacted' => '#FA8072',
        ];
        return collect($aWarrantyChartDataColor)->reduce(function (PieChartModel $oPieChartModel, $oData, $mKey) use ($aWarrantyChartDataColor, $aWarrantyData) {
            $mValue = 0;
            switch ($mKey) {
                case 'was_resolved' : $mValue = $aWarrantyData->whereNotNull('was_resolved')->count(); break;
                case 'was_contacted' : $mValue = $aWarrantyData->whereNotNull('was_contacted')->count(); break;
                case 'not_yet_resolved' : $mValue = $aWarrantyData->whereNull('was_resolved')->count(); break;
                case 'not_yet_contacted' : $mValue = $aWarrantyData->whereNull('was_contacted')->count(); break;
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
                    'maintenance-and-turf-care' => '#f6ad55'
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
