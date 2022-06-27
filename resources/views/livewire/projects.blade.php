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

            @if(count($aProjects) <= 0)
                <strong class="pb-5" style="text-align-last: center;">No projects as of the moment.</strong>
            @endif
        </div>
        <!-- portfolio filter close -->
        <div id="gallery" class="row grid_gallery gallery de-gallery wow fadeInUp" data-wow-delay=".3s">
            @foreach($aProjects as $aProject)
                @if($aProject['type'] === 'video-external')
                    <div class="item project-type-{{ $aProject['projectType']['project_type_id'] }}"
                         style="width: 250px;">
                        <figure class="picframe invert transparent shadow-soft rounded">
										<span class="v-center">
											<span>
												<a id="play-video" class="video-play-button popup-youtube"
                                                   href="{{ url($aProject['url']) }}">
													<span></span>
												</a>
											</span>
										</span>
                            <img src="{{ url($aProject['thumbnail_url'] ) }}" class="img-fullwidth" alt="{{ $aProject['description'] }}">
                        </figure>
                    </div>
                @else
                <!-- gallery item -->
                <div class="item project-type-{{ $aProject['projectType']['project_type_id'] }}" style="width: 250px;">
                    <div class="picframe">
                        <a class="image-popup-gallery" href="{{ url($aProject['url']) }}">
                                    <span class="overlay">
                                        <span class="pf_text">
                                            <span class="project-name">{{ $aProject['description'] }}</span>
                                        </span>
                                    </span>
                        </a>
                        <img src="{{ url($aProject['url']) }}" alt="{{ $aProject['description'] }}" />
                    </div>
                </div>
                <!-- close gallery item -->
                @endif
            @endforeach
        </div>
    </div>
</section>
<!-- section close -->
