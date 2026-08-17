<div class="light-wrapper">
    <div class="container inner">
        <div class="section-title text-center">
            <h3>Chart Examples</h3>
            <p class="lead">build great looking charts using chart.js</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="divide20"></div>
                <h3>Bar Chart Example</h3>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean eu leo quam.
                    Pellentesque ornare sem lacinia quam venenatis vestibulum. Morbi leo risus, porta ac consectetur
                    ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna
                    mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
            <div class="col-md-6">
                <canvas id="BarChart" height="100" class="img-responsive"></canvas>
            </div>
        </div>
        <div class="divide90"></div>
        <div class="row">
            <div class="col-md-6 col-md-push-6">
                <div class="divide20"></div>
                <h3>Pie & Doughnut Chart Examples</h3>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean eu leo quam.
                    Pellentesque ornare sem lacinia quam venenatis vestibulum. Morbi leo risus, porta ac consectetur
                    ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna
                    mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
            <!-- /column -->
            <div class="col-md-6 col-md-pull-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-center">
                            <canvas id="pieChart" width="500" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /column -->
                    <div class="col-sm-6">
                        <div class="text-center">
                            <canvas id="doughnutChart" width="500" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
        <div class="divide90"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="divide20"></div>
                <h3>Line Chart Example</h3>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean eu leo quam.
                    Pellentesque ornare sem lacinia quam venenatis vestibulum. Morbi leo risus, porta ac consectetur
                    ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Nullam quis risus eget urna
                    mollis ornare vel eu leo. Cras mattis consectetur purus sit amet fermentum.</p>
            </div>
            <!-- /column -->
            <div class="col-md-6">
                <canvas id="lineChart" height="100" class="img-responsive"></canvas>
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->

        <script>
            /*-----------------------------------------------------------------------------------*/
            /*	CHARTS
            /*-----------------------------------------------------------------------------------*/
            var barChartData = {
                labels: ["2010", "2011", "2012", "2013", "2014", "2015"],
                datasets: [{
                    //SET COLORS BELOW
                    fillColor: "rgba(69,190,132,0.5)",
                    strokeColor: "rgba(69,190,132,0.8)",
                    highlightFill: "rgba(69,190,132,0.75)",
                    highlightStroke: "rgba(69,190,132,1)",
                    data: [35, 45, 90, 100, 150, 160] // SET YOUR DATA POINTS HERE
                }, {
                    fillColor: "rgba(224,103,106,0.5)",
                    strokeColor: "rgba(224,103,106,0.8)",
                    highlightFill: "rgba(224,103,106,0.75)",
                    highlightStroke: "rgba(224,103,106,1)",
                    data: [15, 55, 40, 80, 50, 180] // SET YOUR DATA POINTS HERE
                }]
            }
            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June"],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.6)", // SET COLORS BELOW
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(250,250,250,1)",
                    data: [35, 45, 90, 100, 150, 160] // SET YOUR DATA POINTS HERE
                }, {
                    label: "My Second dataset",
                    fillColor: "rgba(106,186,222, 0.4)", // SET COLORS BELOW
                    strokeColor: "rgba(106,186,222, 0.6)",
                    pointColor: "rgba(106,186,222,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [15, 55, 40, 80, 50, 180] // SET YOUR DATA POINTS HERE
                }]
            }
            var pieData = [{
                value: 250,
                color: "rgba(106,186,222,0.85)",
                highlight: "rgba(106,186,222,1)",
                label: "Blue"
            }, {
                value: 200,
                color: "rgba(224,103,106,0.85)",
                highlight: "rgba(224,103,106,1)",
                label: "Red"
            }, {
                value: 100,
                color: "rgba(69,190,132,0.85)",
                highlight: "rgba(69,190,132,1)",
                label: "Green"
            }];
            var doughnutData = [{
                value: 300,
                color: "rgba(106,186,222,0.85)",
                highlight: "rgba(106,186,222,1)",
                label: "Blue"
            }, {
                value: 90,
                color: "rgba(224,103,106,0.85)",
                highlight: "rgba(224,103,106,1)",
                label: "Red"
            }, {
                value: 100,
                color: "rgba(69,190,132,0.85)",
                highlight: "rgba(69,190,132,1)",
                label: "Green"
            }, {
                value: 120,
                color: "rgba(241,189,105,0.85)",
                highlight: "rgba(241,189,105,1)",
                label: "Yellow"
            }];
            window.onload = function () {
                var ctx = document.getElementById("BarChart").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                    responsive: true,
                    scaleFontFamily: "'Lato', sans-serif",
                    tooltipFontFamily: "'Lato', sans-serif",
                    tooltipTitleFontFamily: "'Lato', sans-serif"
                });
                var ctx2 = document.getElementById("lineChart").getContext("2d");
                window.myLine = new Chart(ctx2).Line(lineChartData, {
                    responsive: true,
                    scaleFontFamily: "'Lato', sans-serif",
                    tooltipFontFamily: "'Lato', sans-serif",
                    tooltipTitleFontFamily: "'Lato', sans-serif"
                });
                var ctx3 = document.getElementById("pieChart").getContext("2d");
                window.myPie = new Chart(ctx3).Pie(pieData, {
                    responsive: true,
                    scaleFontFamily: "'Lato', sans-serif",
                    tooltipFontFamily: "'Lato', sans-serif",
                    tooltipTitleFontFamily: "'Lato', sans-serif"
                });
                var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                window.myDoughnut = new Chart(ctx4).Doughnut(doughnutData, {
                    responsive: true,
                    scaleFontFamily: "'Lato', sans-serif",
                    tooltipFontFamily: "'Lato', sans-serif",
                    tooltipTitleFontFamily: "'Lato', sans-serif"
                });
            };
        </script>
    </div>
    <!-- /.container -->
</div>

