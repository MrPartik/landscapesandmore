<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog as BlogModel;

class Blog extends Component
{
    /**
     * @var array
     */
    public $aBlogs = [];

    public function render()
    {
        $this->initBlog();
        return view('livewire.blog');
    }

    public function initBlog()
    {
        $this->aBlogs =  BlogModel::with('user')->get();
    }
}
