<div class="row my-3">
    <div class="col-12">
        <div class="loading-page" wire:loading.block wire:target="saveBlog">Loading&#8230;</div>
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    @if($bShowAddPage === false)
                        <div class="row">
                        </div>
                        <div class="config block">
                            <div class="col-12 tab-content">
                                <div class="container bootstrap snippets bootdey">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <a href="javascript:"><i class="fa fa-sticky-note blue"></i></a>
                                                <h2>{{ $aCounts['total'] }}</h2>
                                                <h4 class="br-blue">Total of Records</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <a href="javascript:"><i class="fa fa-check text-success"></i></a>
                                                <h2>{{ $aCounts['active'] }}</h2>
                                                <h4 class="br-green">Active</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <div class="config-one-item animated animation fadeInDown">
                                                <a href="javascript:"><i class="fa fa-times text-danger"></i></a>
                                                <h2>{{ $aCounts['inactive'] }}</h2>
                                                <h4 class="br-red">Inactive</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button wire:click="toggleShowAddPage(false)" class="mb-4 btn btn-primary text-white"><span class="fa fa-plus"></span> Add Blog </button>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="daterange" value="" />
                                </div>
                                <div class="col-6">
                                    <button wire:click="generatePdfReport" class="mb-4 btn btn-success text-white"><span class="fa fa-download"></span> Generate Report </button>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <br/>
                        <h3>Blog List</h3>
                        <br/>
                        <br/>
                        <livewire:admin.datatables.blog id="blog-table" searchable="name, description" exportable />
                    @else
                        <h1>Create Blog</h1>
                        <div class="mb-2 de_form">

                            <strong class="de_form" for="upload_featured_image">Upload Featured Image</strong>
                            <div>
                                <input wire:model="featuredImage" id="upload_featured_image" style="display: none"  type="file" accept="image/*">
                                <button onclick="$('#upload_featured_image').click();" class="btn btn-primary text-white">
                                    <span class="fa fa-file"> </span> Upload Featured Image
                                </button>
                                <span>
                                    @if (empty($featuredImage) === true)
                                        Max. file size: 5 MB.
                                    @else
                                        <button wire:click="clearFeaturedImage()" class="btn btn-danger text-white"><i class="fa fa-close"></i> Clear</button>
                                        <a target="_blank" href="{{ (is_object($featuredImage)) ? url($featuredImage->temporaryUrl()) : url($featuredImage)  }}" class="btn btn-outline-primary"><span class="fa fa-eye " /></a>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="mb-2 de_form">
                            <strong class="de_form" for="blogTitle">Enter Blog Title</strong>
                            <div>
                                <input wire:model="blogTitle" id="blogTitle" class="form-control" type="text" placeholder="Title">
                            </div>
                        </div>
                        <div class="mb-2 de_form">
                            <strong class="de_form" for="blogTags">Enter Tags, (separated with , (comma))</strong>
                            <div>
                                <input wire:model="blogTags" id="blogTags" class="form-control" type="text" placeholder="Tags">
                            </div>
                        </div>
                        <div class="mb-2 de_form">
                            <strong class="de_form" for="blogDescription">Enter Blog Description</strong>
                            <div>
                                <input wire:model="blogDescription" id="blogDescription" class="form-control" type="text" placeholder="Blog Description">
                            </div>
                        </div>
                        <strong class="de_form" for="wysiwyg">Blog Contents</strong>
                        <div wire:ignore>
                            <textarea id="wysiwyg"><p></p></textarea>
                            <script type="application/javascript">
                                window.oKothingEditor = null;
                                function initializeWysiwyg() {
                                    if (window.oKothingEditor !== null) {
                                        window.oKothingEditor.destroy();
                                        window.oKothingEditor = null;
                                    }
                                    window.oKothingEditor = window.KothingEditor.create('wysiwyg', {
                                            display: "block",
                                            width: "100%",
                                            height: "auto",
                                            popupDisplay: "full",
                                            imageFileInput: true,
                                            katex: katex,
                                            imageUploadUrl: "/api/upload-image",
                                            // imageGalleryUrl: "/api/get-uploaded-images",
                                            imageUploadSizeLimit: "5000000",
                                            toolbarItem: [
                                                ["undo", "redo"],
                                                ["font", "fontSize", "formatBlock"],
                                                [
                                                    "bold",
                                                    "underline",
                                                    "italic",
                                                    "strike",
                                                    "subscript",
                                                    "superscript",
                                                    "fontColor",
                                                    "hiliteColor",
                                                ],
                                                ["outdent", "indent", "align", "list", "horizontalRule"],
                                                ["link", "table", "image", "audio", "video"],
                                                ["lineHeight", "paragraphStyle", "textStyle"],
                                                ["showBlocks", "codeView"],
                                                ["math"],
                                                ["preview", "print", "fullScreen"],
                                                ["removeFormat"],
                                            ],
                                            charCounter: true,
                                        });
                                }
                                initializeWysiwyg();
                            </script>
                        </div>
                        @if(empty($errors->getMessages()) === false)
                            <div class='alert mt-3 alert-danger'>
                                @foreach($errors->getMessages() as $error)
                                    {!!  '- ' . implode(',', $error) . '<br/>' !!}
                                @endforeach
                            </div>
                        @endif
                        <div class="col-2 mt-3">
                            <button wire:click="toggleShowAddPage(true)" class="mb-4 btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Cancel </button>
                            <button id="saveBlog" class="mb-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                        </div>
                        <script>
                            $('#saveBlog').click(function(){
                                @this.set('blogContent', window.oKothingEditor.getContents());
                                @this.call('saveBlog');
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            let startDate = moment().subtract(30, 'days');
            let endDate = moment();
            @this.set('startDate', startDate);
            @this.set('endDate', endDate);
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                startDate: startDate,
                endDate: endDate
            }, function(start, end, label) {
                @this.set('startDate', start);
                @this.set('endDate', end);
            });
        });
    </script>
</div>
