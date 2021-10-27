Chart.defaults.global.defaultFontFamily = 'Nunito',
'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$(function() {
    $('#data-content-suhu').addClass('d-none');
    $('#loader-suhu').addClass('my-5');
    $('#loader-suhu').html(
        '<div id="loading-image" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>'
    );
    $('#data-content-ph').addClass('d-none');
    $('#loader-ph').addClass('my-5');
    $('#loader-ph').html(
        '<div id="loading-image" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>'
    );
    $.ajax({
        url: "/chart/data",
        method: "GET",
        dataType: "json",
        success: function(response) {
            $('#loader-suhu').html('');
            $('#loader-suhu').removeClass('my-5');
            $('#data-content-suhu').removeClass('d-none');
            $('#loader-ph').html('');
            $('#loader-ph').removeClass('my-5');
            $('#data-content-ph').removeClass('d-none');
            var suhu = document.getElementById("suhuChart");
            var ph = document.getElementById("phChart");
            var suhuLineChart = new Chart(suhu, {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets: response.suhu_datasets,
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                callback: function(value, index, values) {
                                    return value + ' Celcius';
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem
                                    .datasetIndex].label || '';
                                return datasetLabel + ': ' + tooltipItem.yLabel +
                                    ' Celcius';
                            }
                        }
                    }
                }
            });

            var phLineChart = new Chart(ph, {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets: response.ph_datasets,
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                callback: function(value, index, values) {
                                    return value + ' pH';
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem
                                    .datasetIndex].label || '';
                                return datasetLabel + ': ' + tooltipItem.yLabel +
                                    ' pH';
                            }
                        }
                    }
                }
            });
        }
    });
});
