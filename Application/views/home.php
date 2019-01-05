<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 p-3">
        <h3 class="mb-sm-0">Finance Dashboard</h3>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#"><i class="fe fe-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Finance Dashboard</li>
        </ol>

    </div>
    <div class="row finance-content">
        <div class="col-xl-3 col-md-6">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h3 class="mb-3">Gross profit Margin</h3>
                    <div class="chart-circle" data-value="0.75" data-thickness="10" data-color="#ad59ff"><canvas width="128" height="128"></canvas>
                        <div class="chart-circle-value"><div class="text-xxl">75% </div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h3 class="mb-3">Opex Ratio</h3>
                    <div class="chart-circle" data-value="0.55" data-thickness="10" data-color="#00d9bf"><canvas width="128" height="128"></canvas>
                        <div class="chart-circle-value"><div class="text-xxl">55%</div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h3 class="mb-3">Operating Profit Margin</h3>
                    <div class="chart-circle" data-value="0.30" data-thickness="10" data-color="#fc0"><canvas width="128" height="128"></canvas>
                        <div class="chart-circle-value"><div class="text-xxl">30%</div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h3 class="mb-3">Net Profit Margin</h3>
                    <div class="chart-circle" data-value="0.45" data-thickness="10" data-color="#00b3ff"><canvas width="128" height="128"></canvas>
                        <div class="chart-circle-value"><div class="text-xxl">45%</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9">
            <div class="card  shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Monthly Net Profit</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <canvas id="finance-chart" class="chart-dropshadow h-315"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow bg-gradient-primary">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="text-white h3">Quick Ratio</small>
                                        <h2 class="text-xxl text-white mb-0"> 0.74</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow bg-gradient-info">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="text-white h3">Current Ratio</small>
                                        <h2 class="text-xxl text-white mb-0"> 1.68</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow bg-gradient-success">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="text-white h3">Cash Balance</small>
                                        <h2 class="text-xxl text-white mb-0"><i class="fas fa-dollar-sign"></i> 1,35,265</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card  shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="mb-0">Return On Assets</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body finance-chart">
                            <div class="finance-ratio ">
                                25%
                            </div>
                            <!-- Chart -->
                            <canvas id="finance-chart1" class="chart-dropshadow mt-5 h-200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card  shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="mb-0">Working Capital Ratio</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body finance-chart">
                            <div class="finance-ratio ">
                                0.5:1
                            </div>
                            <!-- Chart -->
                            <canvas id="finance-chart2" class="chart-dropshadow mt-5 h-200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card  shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="mb-0">Return On Equity</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body finance-chart">
                            <div class="finance-ratio ">
                                32%
                            </div>
                            <!-- Chart -->
                            <canvas id="finance-chart3" class="chart-dropshadow mt-5 h-200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card shadow">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="mb-0">Debit Equity Ratio</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body finance-chart">
                            <div class="finance-ratio ">
                                0.8:1
                            </div>
                            <!-- Chart -->
                            <canvas id="finance-chart4" class="chart-dropshadow mt-5 h-200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card  shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Balance sheet</h2>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="card-body">
                        <div class="grid-margin">
                            <div class="">
                                <div class="table-responsive balance-sheet">
                                    <table class="table card-table table-bordered  text-nowrap align-items-center">
                                        <tbody>
                                        <tr>
                                            <td class=" text-lg font-weight-700">Total Assets</td>
                                            <td class="font-weight-700 text-lg">$ 78,25,256</td>
                                            <td class=""><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>2,3,5,3,2,3,4,5,6</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-weight-700">Current Assets</td>
                                            <td class="font-weight-700">$ 45,26,356</td>
                                            <td class="w-100"><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>3,4,5,6,2,3,5,3,2</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm">Cash</td>
                                            <td>$ 12,78,256</td>
                                            <td class="w-100"><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>2,4,5,6,3,5,3,2,3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm">Account Receivable</td>
                                            <td>$ 15,45,325</td>
                                            <td class="w-100"><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>5,3,2,3,4,5,6,2,3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm">Invests</td>
                                            <td>$ 17,02,775</td>
                                            <td class="w-100"><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>3,2,3,4,5,6,2,3,5</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-weight-700">Long Term Assets</td>
                                            <td class="font-weight-700">$ 32,98,900</td>
                                            <td class="w-100"><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>3,2,3,4,5,6,2,3,5</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive mt-4 balance-sheet">
                                    <table class="table card-table table-bordered table-vcenter text-nowrap align-items-center">
                                        <tbody>
                                        <tr>
                                            <td class="text-lg font-weight-700">Total Liabilities</td>
                                            <td class="font-weight-700 text-lg">$ 78,25,256</td>
                                            <td><span class="bar-chart" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>4,5,6,2,3,5,3,2,3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-weight-700">Current Liabilities</td>
                                            <td class="font-weight-700">$45,62,235</td>
                                            <td><span class="bar-chart" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>4,5,2,2,3,4,5,6</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-sm font-weight-700">Share Holder Equity</td>
                                            <td class="font-weight-700">$ 32,63,021</td>
                                            <td class=""><span class="bar-chart w-9" data-peity='{ "fill": ["#ad59ff","#00d9bf"]}'>3,2,3,4,5,6,2,3</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include PATH."/Application/views/site/foot-div.php"; ?>
    <!-- Footer -->
</div>