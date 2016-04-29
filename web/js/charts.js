//$(function () {
//    var $container = $('#main-chart'),
//    chart;
//    $container.highcharts({
//
//        chart: {
//            
//        },
//
//        title: {
//            text: 'Monthly Average Temperature',
//            x: -20 //center
//        },
//        subtitle: {
//            text: 'Source: WorldClimate.com',
//            x: -20
//        },
//        xAxis: {
//            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
//                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
//        },
//        yAxis: {
//            title: {
//                text: 'Temperature (°C)'
//            },
//            plotLines: [{
//                value: 0,
//                width: 1,
//                color: '#808080'
//            }]
//        },
//        tooltip: {
//            valueSuffix: '°C'
//        },
//        legend: {
//            layout: 'vertical',
//            align: 'right',
//            verticalAlign: 'middle',
//            borderWidth: 0
//        },
//        series: [{
//            name: 'Tokyo',
//            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
//        }, {
//            name: 'New York',
//            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
//        }, {
//            name: 'Berlin',
//            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
//        }, {
//            name: 'London',
//            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
//        }]
//    });
//
//chart = $container.highcharts();
//    // $('.nav-container').mouseover(function() {
//    //     chart.setSize(calc(100% - 220), 400, doAnimation = true);
//    // });
//
//});






$(function () {
    $('.question-chart').each(function () {
        var stats = $(this).data('stats');
        //console.log(stats.series.data);        
        $(stats.series.data).each(function(){
            this.y = parseInt(this.y);
        });
        //console.log(stats.series.data.reverse());
        $(this).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: stats.title
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },            
            series: [{
                    name: stats.series.name,
                    colorByPoint: true,
                    data: stats.series.data                    
                }]
        });
    });
});