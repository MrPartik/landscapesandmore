<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog as BlogModel;

class Blog extends Component
{
    use WithFileUploads;

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
        'featuredImage' => 'required',
        'blogTitle' => 'required|unique:blog,title',
        'blogTags'=> 'sometimes',
        'blogDescription'=> 'required',
        'blogContent'=> 'required',
    ];

    public function render()
    {
        return view('livewire.admin.blog');
    }

    /**
     *
     */
    public function dehydrate() {
        $this->emit('initializeWysiwyg');
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
        $this->featuredImage = [];
    }

    public function saveBlog()
    {
        $this->validate($this->blogRules);
        $sFileName = str_replace(' ', '-', mb_strtolower(trim($this->blogTitle)));
        $sFilePath = 'blog/files/' . $sFileName;
        Storage::disk('public')->put($sFilePath, $this->blogContent);
        $sFeaturedImagePath = $this->featuredImage->storeAs('public', 'blog/images/' . $sFileName . '-' . time() . '.' . $this->featuredImage->getClientOriginalExtension());
        $sFeaturedImagePath = '/' . str_replace('public', 'storage', $sFeaturedImagePath);
        $oBlogModel = new BlogModel();
        $oBlogModel->title = $this->blogTitle;
        $oBlogModel->tags = $this->blogTags;
        $oBlogModel->content = '/storage/' . $sFilePath;
        $oBlogModel->description = $this->blogDescription;
        $oBlogModel->featured_image = $sFeaturedImagePath;
        $oBlogModel->user_id = Auth::id();
        $oBlogModel->save();

        $this->blogTitle = '';
        $this->blogTags = '';
        $this->featuredImage = '';
        $this->blogContent = 'Sample Blog Content';
        $this->bShowAddPage = true;
    }
}
