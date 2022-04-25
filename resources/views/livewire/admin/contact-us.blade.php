
<div class="config block">
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-3 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-sticky-note blue"></i></a>
                            <h2>{{ $aCounts['total'] }}</h2>
                            <h4 class="br-blue">Total of Record</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-leaf green"></i></a>
                            <h2>{{ $aCounts['landscape_type'] }}</h2>
                            <h4 class="br-green">Landscape</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-people-carry orange"></i></a>
                            <h2>{{ $aCounts['maintenance_type'] }}</h2>
                            <h4 class="br-orange">Maintenance and Turf Care</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                        <div class="config-one-item animated animation fadeInDown">
                            <a href="javascript:"><i class="fa fa-times text-danger"></i>&nbsp;<i class="fa fa-map-marker text-danger"></i></a>
                            <h2>{{ $aCounts['serviceable_area'] }}</h2>
                            <h4 class="br-red">Not serviceable area</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <hr/>
                    <h3>Contact Us List</h3>
                    <br/>
                    <livewire:admin.datatables.contact-us id="contact-us-table" searchable="name, description" exportable />
                </div>
            </div>
        </div>
    </div>
</div>
