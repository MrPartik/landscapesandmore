<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Library\Utilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog as BlogModel;
use MPdf;

class Blog extends Component
{
    use WithFileUploads;

    public $aCounts = [
        'total'    => 0,
        'active'   => 0,
        'inactive' => 0,
    ];

    /**
     * @var bool
     */
    public $bShowAddPage = false;

    /**
     * @var null
     */
    public $featuredImage = null;

    /**
     * @var string
     */
    public $blogTitle = '';

    /**
     * @var string
     */
    public $blogTags = '';

    /**
     * @var string
     */
    public $blogDescription = '';

    /**
     * @var string
     */
    public $blogContent = '';

    /**
     * @var array
     */
    private $blogRules = [
        'featuredImage'   => 'required',
        'blogTitle'       => 'required|unique:blog,title',
        'blogTags'        => 'sometimes',
        'blogDescription' => 'required',
        'blogContent'     => 'required',
    ];

    public $aModel = [];

    public $listeners = [
        'initBlogDashboardCounter',
    ];

    public $startDate;
    public $endDate;

    public function render()
    {
        $this->initBlogDashboardCounter();
        return view('livewire.admin.blog');
    }

    public function initBlogDashboardCounter()
    {
        $this->aModel = BlogModel::all();
        $this->aCounts = [
            'total'    => $this->aModel->count(),
            'active'   => $this->aModel->where('is_active', true)->count(),
            'inactive' => $this->aModel->where('is_active', false)->count(),
        ];
    }

    /**
     * @param bool|null $mIsShown
     */
    public function toggleShowAddPage(?bool $mIsShown = null)
    {
        $this->bShowAddPage = ($mIsShown !== null) ? !$this->bShowAddPage : $mIsShown;
    }

    /**
     *
     */
    public function clearFeaturedImage()
    {
        $this->featuredImage = null;
    }

    public function saveBlog()
    {
        $this->validate($this->blogRules);
        $sFileName = str_replace(' ', '-', mb_strtolower(trim($this->blogTitle)));
        $sFeaturedImagePath = $this->featuredImage->storeAs('public', 'blog/images/' . $sFileName . '-' . time() . '.' . $this->featuredImage->getClientOriginalExtension());
        $sFeaturedImagePath = '/' . str_replace('public', 'storage', $sFeaturedImagePath);
        $oBlogModel = new BlogModel();
        $oBlogModel->title = $this->blogTitle;
        $oBlogModel->tags = $this->blogTags;
        $oBlogModel->content = $this->blogContent;
        $oBlogModel->description = $this->blogDescription;
        $oBlogModel->featured_image = $sFeaturedImagePath;
        $oBlogModel->user_id = Auth::id();
        $oBlogModel->is_active = Auth::user()->role === 'admin';
        $oBlogModel->save();

        $this->blogTitle = '';
        $this->blogTags = '';
        $this->featuredImage = '';
        $this->blogContent = 'Sample Blog Content';
        $oBlogModel->description = '';
        $this->bShowAddPage = true;
        $this->emit('initializeWysiwyg');
        redirect('/admin/blog');
    }

    public function generatePdfReport()
    {
        $oPdf = MPdf::loadView('pdf.blog', array_merge($this->aCounts, [
            'aModel'    => $this->aModel->whereBetween('created_at', [$this->startDate, $this->endDate]),
            'startDate' => Carbon::createFromDate($this->startDate),
            'endDate'   => Carbon::createFromDate($this->endDate),
        ]));
        return Utilities::streamDownload($oPdf, 'blog-report-' . time() . '.pdf');
    }
}
