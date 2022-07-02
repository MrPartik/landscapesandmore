<!-- section begin -->
<section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
    <div class="container">
        <div class="spacer-single"></div>

        <!-- portfolio filter begin -->
        <div class="row">
            <div class="col-md-12 text-center">
                <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                    <li><a href="#" data-filter="*" class="selected">All Projects</a></li>
                    @foreach($aProjectTypes->where('type', '3D video') as $aProjectType)
                        <li><a href="#" data-filter=".project-type-{{ $aProjectType['project_type_id'] }}">{{ $aProjectType['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            @if(count($aProjects) <= 0)
                <strong class="pb-5" style="text-align-last: center;">No projects as of the moment.</strong>
            @endif
        </div>
        <!-- portfolio filter close -->
        <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">
            @foreach($aProjects->wherein('project_type_id', $aProjectTypes->where('type', '3D video')->pluck('project_type_id')) as $aProject)
                @if($aProject['type'] === 'video-external')
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 project-type-{{ $aProject['projectType']['project_type_id'] }}" >
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
                <div class="col-md-4 col-sm-6 col-xs-12 item mb30 project-type-{{ $aProject['projectType']['project_type_id'] }}"  >
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
