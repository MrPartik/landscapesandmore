<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog as BlogModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;

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
     * @var int
     */
    public $iId = 0;

    /**
     * @var array
     */
    private $blogRules = [
        'featuredImage' => 'required',
        'blogTitle' => 'required',
        'blogTags'=> 'sometimes',
        'blogDescription'=> 'required',
        'blogContent'=> 'required',
    ];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.admin.blog-edit');
    }

    public function mount() {
        $this->initBlogInfo();
    }

    /**
     *
     */
    public function initBlogInfo()
    {
        $this->iId = request()->route()->parameters['id'];
        $mBlogModel = BlogModel::find($this->iId);
        $this->featuredImage = $mBlogModel->featured_image;
        $this->blogTitle = $mBlogModel->title;
        $this->blogTags = $mBlogModel->tags;
        $this->blogDescription = $mBlogModel->description;
        $this->blogContent = $mBlogModel->content;
//        $this->emit('initializeWysiwyg');
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
        $mFeaturedImagePath = $this->featuredImage;
        if (is_object($mFeaturedImagePath)) {
            $mFeaturedImagePath = $this->featuredImage->storeAs('public', 'blog/images/' . $sFileName . '-' . time() . '.' . $this->featuredImage->getClientOriginalExtension());
            $mFeaturedImagePath = '/' . str_replace('public', 'storage', $mFeaturedImagePath);
        }
        $oBlogModel = BlogModel::find($this->iId);
        $oBlogModel->title = $this->blogTitle;
        $oBlogModel->tags = $this->blogTags;
        $oBlogModel->content = $this->blogContent;
        $oBlogModel->description = $this->blogDescription;
        $oBlogModel->featured_image = $mFeaturedImagePath;
        $oBlogModel->user_id = Auth::id();
        $oBlogModel->save();
        redirect('/admin/blog');
    }
}
