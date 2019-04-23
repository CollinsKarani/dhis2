  <!--footer start-->
            <div id="footer" class="ui-footer">
                2018 &copy; eHEALTH SYSTEM
            </div>
            <!--footer end-->

        </div>

        <!-- inject:js -->
        <script src="<?php Page_Url() ?>bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php Page_Url() ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php Page_Url() ?>bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="<?php Page_Url() ?>bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->


        <!--Data Table-->
        <script src="<?php Page_Url() ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php Page_Url() ?>bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="<?php Page_Url() ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php Page_Url() ?>bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="<?php Page_Url() ?>bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="<?php Page_Url() ?>bower_components/datatables-scroller/js/dataTables.scroller.js"></script>


       <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="../assets/js/init-daterangepicker.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="../assets/js/init-datepicker.js"></script>


        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="../bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        <script src="../assets/js/init-timepicker.js"></script>

        <!--init data tables-->
        <script src="<?php Page_Url() ?>assets/js/init-datatables.js"></script>
        <!--highcharts-->
        <script src="<?php Page_Url() ?>bower_components/highcharts/highcharts.js"></script>
        <script src="<?php Page_Url() ?>bower_components/highcharts/highcharts-more.js"></script>
        <script src="<?php Page_Url() ?>bower_components/highcharts/modules/exporting.js"></script>

                                         <script type="text/javascript">
(function($) {
        "use strict";
Highcharts.chart('container2', {
                chart: {
                                zoomType: 'xy'
                },
                title: {
                                text: 'Indicators Calculation Analysis'
                },
                xAxis: [{
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                                labels: {
                                                format: '{value}',
                                                style: {
                                                                color: Highcharts.getOptions().colors[2]
                                                }
                                },
                                title: {
                                                text: 'Measles',
                                                style: {
                                                                color: Highcharts.getOptions().colors[2]
                                                }
                                },
                                opposite: true

                }, { // Secondary yAxis
                                gridLineWidth: 0,
                                title: {
                                                text: 'Malaria Coverage',
                                                style: {
                                                                color: Highcharts.getOptions().colors[0]
                                                }
                                },
                                labels: {
                                                format: '{value}',
                                                style: {
                                                                color: Highcharts.getOptions().colors[0]
                                                }
                                }
                }, { // Tertiary yAxis
                                gridLineWidth: 0,
                                title: {
                                                text: 'Indicators',
                                                style: {
                                                                color: Highcharts.getOptions().colors[1]
                                                }
                                },
                                labels: {
                                                format: '{value}',
                                                style: {
                                                                color: Highcharts.getOptions().colors[1]
                                                }
                                },
                                opposite: true
                }],
                tooltip: {
                                shared: true
                },
                legend: {
                                layout: 'vertical',
                                align: 'left',
                                x: 80,
                                verticalAlign: 'top',
                                y: 55,
                                floating: true,
                                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                series: [{
                                name: 'Fully Immunized Child Above 2 Years',
                                type: 'column',
                                yAxis: 1,
                                data: [<?php echo $chart_data; ?>],
                                tooltip: {
                                }
                }, {
                                name: 'Immunisation',
                                type: 'spline',
                                yAxis: 2,
                                data: [1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7],
                                marker: {
                                                enabled: false
                                },
                                dashStyle: 'shortdot',
                                tooltip: {
                                }
                }, {
                                name: 'Measles',
                                type: 'spline',
                                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                                tooltip: {
                                }
                }]
});
})(jQuery);
</script>



        <!--sparkline-->
        <script src="<?php Page_Url() ?>bower_components/bower-jquery-sparkline/dist/jquery.sparkline.retina.js"></script>
        <script src="<?php Page_Url() ?>assets/js/init-sparkline.js"></script>


        <!--echarts-->
        <script type="text/javascript" src="<?php Page_Url() ?>assets/js/echarts/echarts-all-3.js"></script>


        <!--easypiechart-->
        <script src="<?php Page_Url() ?>assets/js/jquery-easy-pie-chart/jquery.easypiechart.js"></script>
        <script>
            $(function() {
                $('.chart').easyPieChart({
                    //your configuration goes here
                });
            });
        </script>


        <!--horizontal-timeline-->
        <script src="<?php Page_Url() ?>assets/js/horizontal-timeline/js/jquery.mobile.custom.min.js"></script>
        <script src="<?php Page_Url() ?>assets/js/horizontal-timeline/js/main.js"></script>
        <script src="../bower_components/raphael/raphael.min.js"></script>
        <script src="../bower_components/morris.js/morris.min.js"></script>
                <script>
Morris.Bar({
 element : 'month1',
 data:[<?php echo $month_data; ?>],
 xkey:'period',
 ykeys:['recorded_value'],
 labels:['period', 'Recorded Value'],
 hideHover:'auto',
 stacked:false
});
</script>
        <!-- Common Script   -->
        <script src="<?php Page_Url() ?>dist/js/main.js"></script>


    </body>
</html>
