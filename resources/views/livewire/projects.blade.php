<!-- section begin -->
<section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
    <div class="container">
        <div class="spacer-single"></div>

        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                    <li><a href="#" data-filter="*" class="selected">All Projects</a></li>
                    @foreach($aProjectTypes as $aProjectType)
                        <li><a href="#" data-filter=".project-type-{{ $aProjectType['project_type_id'] }}">{{ $aProjectType['name'] }}</a></li>
                    @endforeach
                </ul>

            </div>
        </div>
        <!-- portfolio filter close -->
        <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">
            @foreach($aProjects as $aProject)
                <!-- gallery item -->
                <div class="col-md-4 item project-type-{{ $aProject['projectType']['project_type_id'] }}" style="width: 300px;height: 300px">
                    <div class="picframe">
                        <a class="image-popup-gallery" href="{{ url($aProject['url']) }}">
                                    <span class="overlay">
                                        <span class="pf_text">
                                            <span class="project-name">{{ $aProject['description'] }}</span>
                                        </span>
                                    </span>
                        </a>
                        <img src="{{ url($aProject['url']) }}" alt="" />
                    </div>
                </div>
                <!-- close gallery item -->
            @endforeach
        </div>
    </div>
</section>
<!-- section close -->
