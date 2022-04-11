<div class="row my-5">
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    @if($bShowAddPage === false)
                        <div class="col-2">
                            <button wire:click="toggleShowAddPage(false)" class="mb-4 btn btn-primary text-white"><span class="fa fa-plus"></span> Add Blog </button>
                        </div>
                        <livewire:admin.datatables.blog id="blog-table" searchable="name, description" exportable />
                    @else
                        <div class="col-2">
                            <button wire:click="toggleShowAddPage(true)" class="mb-4 btn btn-primary text-white"><span class="fa fa-arrow-left"></span> Back </button>
                        </div>
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
                        <textarea id="wysiwyg"></textarea>
                        <script type="application/javascript">
                            window.oKothingEditor = null;
                            function initializeWysiwyg() {
                                if (window.oKothingEditor !== null) {
                                    window.oKothingEditor.destroy();
                                    window.oKothingEditor = null;
                                }
                                window.oKothingEditor = window.KothingEditor.create((document.getElementById('wysiwyg') || 'wysiwyg'), {display: "block",
                                    width: "100%",
                                    height: "auto",
                                    popupDisplay: "full",
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
                                        ["preview", "print", "fullScreen"],
                                        ["save", "template"],
                                        ["removeFormat"],
                                    ],
                                    templates: [
                                        {
                                            name: "Template-1",
                                            html: "<p>HTML source1</p>",
                                        },
                                        {
                                            name: "Template-2",
                                            html: "<p>HTML source2</p>",
                                        },
                                    ],
                                    charCounter: true,
                                });
                            }
                            initializeWysiwyg();
                            window.livewire.on('initializeWysiwyg', function () {
                                initializeWysiwyg();
                                $('.ke-wrapper-wysiwyg').html("{{ $blogContent }}");
                            });

                        </script>
                        @if(empty($errors->getMessages()) === false)
                            <div class='alert mt-3 alert-danger'>
                                @foreach($errors->getMessages() as $error)
                                    {!!  '- ' . implode(',', $error) . '<br/>' !!}
                                @endforeach
                            </div>
                        @endif
                    @endif
                    <div class="col-2 mt-3">
                        <button wire:click="saveBlog" id="saveBlog" class="mb-4 btn btn-success text-white"><span class="fa fa-save"></span> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#saveBlog').click(function(){
            @this.set('blogContent', window.oKothingEditor.getContents());
        });
    </script>
</div>
