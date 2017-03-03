<html> 
    <head> 
        <!--Load the AJAX API--> 
        <script type="text/javascript" src="https://www.google.com/jsapi"></script> 
        <script type="text/javascript"> 
            google.charts.load('44', {
                callback: drawChart,
                packages: ['controls', 'corechart']
            });

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('date', 'X');
                data.addColumn('number', 'Y1');
                data.addColumn('number', 'Y2');

                data.addRow([new Date(2016,  0, 1), 1,123]);
                data.addRow([new Date(2016,  1, 1), 6,42 ]);
                data.addRow([new Date(2016,  2, 1), 4,49 ]);
                data.addRow([new Date(2016,  3, 1), 23,486 ]);
                data.addRow([new Date(2016,  4, 1), 89,476 ]);
                data.addRow([new Date(2016,  5, 1), 46,444 ]);
                data.addRow([new Date(2016,  6, 1), 178,442 ]);
                data.addRow([new Date(2016,  7, 1), 12,274 ]);
                data.addRow([new Date(2016,  8, 1), 123,4934 ]);
                data.addRow([new Date(2016,  9, 1), 144,4145 ]);
                data.addRow([new Date(2016, 10, 1), 135,946 ]);
                data.addRow([new Date(2016, 11, 1), 178,747 ]);

                var control = new google.visualization.ControlWrapper({
                    controlType: 'ChartRangeFilter',
                    containerId: 'control_div',
                    options: {
                        filterColumnIndex: 0,
                        ui: {
                            chartOptions: {
                                height: 50,
                                width: 600,
                                chartArea: {
                                    width: '80%'
                                }
                            }
                        }
                    }
                });

                var chart = new google.visualization.ChartWrapper({
                    chartType: 'LineChart',
                    containerId: 'chart_div',
                    options: {
                        width: 620,
                        chartArea: {
                            width: '80%'
                        },
                        hAxis: {
                            format: 'MMM',
                            slantedText: false,
                            maxAlternation: 1
                        }
                    }
                });

                function setOptions() {
                    var firstDate;
                    var lastDate;
                    var v = control.getState();

                    if (v.range) {
                        document.getElementById('dbgchart').innerHTML = v.range.start + ' to ' + v.range.end;
                        firstDate = new Date(v.range.start.getTime() + 1);
                        lastDate = new Date(v.range.end.getTime() - 1);
                        data.setValue(v.range.start.getMonth(), 0, firstDate);
                        data.setValue(v.range.end.getMonth(), 0, lastDate);
                    } else {
                        firstDate = data.getValue(0, 0);
                        lastDate = data.getValue(data.getNumberOfRows() - 1, 0);
                    }

                    var ticks = [];
                    for (var i = firstDate.getMonth(); i <= lastDate.getMonth(); i++) {
                        ticks.push(data.getValue(i, 0));
                    }

                    chart.setOption('hAxis.ticks', ticks);
                    chart.setOption('hAxis.viewWindow.min', firstDate);
                    chart.setOption('hAxis.viewWindow.max', lastDate);
                    if (dash) {
                        chart.draw();
                    }
                }

                setOptions();
                google.visualization.events.addListener(control, 'statechange', setOptions);

                var dash = new google.visualization.Dashboard(document.getElementById('dashboard'));
                dash.bind([control], [chart]);
                dash.draw(data);
            }
        </script> 
    </head> 
    <body> 
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="dashboard">
            <div id="chart_div"></div>
            <div id="control_div"></div>
            <p><span id='dbgchart'></span></p>
        </div>

    </body> 
</html>