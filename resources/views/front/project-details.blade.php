<div class="container project-view">
    @php
        $aProjectDetailsModel = \App\Models\ProjectDetails::where('project_id', $id)->first() ?? [];
    @endphp
    <div class="row">
        <div class="col-md-8 project-images">
            @foreach(explode(',', $aProjectDetailsModel['images'] ?? '') as $sImage)
                <img src="{{ $sImage }}" alt="" class="img-responsive" />
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="project-info">
                <h2>{{ $aProjectDetailsModel['title'] ?? '' }}</h2>
                <div class="details">
                    <div class="info-text">
                        <span class="title">Date</span>
                        <span class="val">{{ $aProjectDetailsModel['date'] ?? '' }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Location</span>
                        <span class="val">{{ $aProjectDetailsModel['location'] ?? '' }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Value</span>
                        <span class="val">{{ $aProjectDetailsModel['value'] ?? '' }}</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Category</span>
                        <span class="val">{{ $aProjectDetailsModel['category'] ?? '' }}</span>
                    </div>
                </div>

                <p>
                    {!! $aProjectDetailsModel['description'] ?? '' !!}
                <p>
            </div>
        </div>
    </div>
</div>
