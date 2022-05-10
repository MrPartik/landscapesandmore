<div class="row my-3">
    <div class="col-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="row">
                    <div class="col-3 mb-3">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="">
                            <h1 style="font-weight: bolder">{{ $aCount['contact_us'] }}</h1>
                                <div style="width: 100%; height: 5px; background-color: #0080E1"></div>
                            <span style="font-weight: bold">Total Contact Us</span>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="">
                            <h1 style="font-weight: bolder">{{ $aCount['warranty_claim'] }}</h1>
                                <div style="width: 100%; height: 5px; background-color: #00C481"></div>
                            <span style="font-weight: bold">Total Warranty Claim</span>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="">
                            <h1 style="font-weight: bolder">{{ $aCount['blog'] }}</h1>
                                <div style="width: 100%; height: 5px; background-color: #D29215"></div>
                            <span style="font-weight: bold">Total Blog Published</span>
                        </div>
                    </div>
                    <div class="col-3 mb-3">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="">
                            <h1 style="font-weight: bolder">{{ $aCount['awards'] }}</h1>
                                <div style="width: 100%; height: 5px; background-color: #DB3B52"></div>
                            <span style="font-weight: bold">Total Added Awards</span>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                            <livewire:livewire-line-chart
                                key="{{ $oLineChartPrevMonth->reactiveKey() }}"
                                :line-chart-model="$oLineChartPrevMonth"
                            />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                            <livewire:livewire-pie-chart
                                key="{{ $oPieChartContactUs->reactiveKey() }}"
                                :pie-chart-model="$oPieChartContactUs"
                            />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="shadow rounded p-4 border bg-white flex-1" style="height: 32rem;">
                            <livewire:livewire-pie-chart
                                key="{{ $oPieChartWarrantyClaim->reactiveKey() }}"
                                :pie-chart-model="$oPieChartWarrantyClaim"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
