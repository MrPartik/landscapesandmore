
<div class="config block">
    <div class="tab-content">
        <!-- 1st Block of tab-content -->
        <div class="tab-pane active" id="home">
            <div class="container bootstrap snippets bootdey">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="config-one-item animated animation fadeInDown">
                            <i class="fa fa-sticky-note blue"></i>
                            <h2>{{ $aCounts['total'] }}</h2>
                            <h4 class="br-blue">Total of Records</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="config-one-item animated animation fadeInDown">
                            <i class="fa fa-times text-danger"></i>&nbsp;<i class="fa fa-map-marker text-danger"></i></a>
                            <h2>{{ $aCounts['serviceable_area'] }}</h2>
                            <h4 class="br-red">Not serviceable area</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <div class="col-4">
                        <button wire:click="generatePdfReport" class="mb-4 btn btn-success text-white"><span class="fa fa-download"></span> Generate Report </button>
                    </div>
                    <hr/>
                        <h3>Applicant List</h3>
                    <br/>
                    <livewire:admin.datatables.careers id="careers-table" searchable="name, description" exportable />
                </div>
            </div>
        </div>
    </div>
</div>
