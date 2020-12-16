'use strict'

function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ')';
}

//var baseUrl = 'http://127.0.0.1:8000';
var baseUrl ='https://vehiculoselectiva2.000webhostapp.com'
var optionShow;
var nameLabal;

$(document).ready(function () {



    /**
     * Tabs
     */
    $('#tabs').tabs();


    /**
     * Limpiando datos
     */
    function cleanG() {
        $('#graficas').empty();
        $('#tableDetails_wrapper').hide();
        $('#tableDetails').addClass('invisible');
    }




    /**
     * get links for fetch
     */
    $('[href = "#tabs-1"]').click(() => {
        console.log('click tab 1');

        cleanG();
        $('#graficas').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson(baseUrl + '/api/marcasTop');
        $('#tableDetails').removeClass('invisible');
        optionShow = 1;
        nameLabal = "Marcas populares en El Salvador";

    });

    $('[href = "#tabs-2"]').click(() => {
        console.log('click tab 2');
        cleanG();
        $('#graficas').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson(baseUrl + '/api/departamentos');
        $('#tableDetails').removeClass('invisible');
        optionShow = 2;
        nameLabal = "Total vehiculos por departamentos de El Salvador";

    });

    $('[href = "#tabs-3"]').click(() => {
        console.log('click tab 3');
        cleanG();
        $('#graficas').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson(baseUrl + '/api/combustibles');
        $('#tableDetails').removeClass('invisible');
        optionShow = 3;
        nameLabal = "Combustible más usado en El Salvador";

    });

    $('[href = "#tabs-4"]').click(() => {
        console.log('click tab 1');
        cleanG();
        $('#graficas').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson(baseUrl + '/api/modelosTop');
        $('#tableDetails').removeClass('invisible');
        optionShow = 4;
        nameLabal = "Modelos de vehiculos más populares en El Salvador";
    });

    $('[href = "#tabs-5"]').click(() => {
        cleanG();
        $('#tableBody').empty();
        $('#tableDetails').addClass('invisible');
        $('#tableDetails0,#tableDetails0_wrapper').hide();
    });

    /**
     * Graficas
     */

    function getJson(url) {
        console.log(url);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                graficar(data);
                getDataTable();
            });

    }

    function graficar(data) {

        console.log('desde graficas ', data);

        const xLabels = [];
        const yValues = [];
        const colors = [];

        data.forEach(function (data) {
            xLabels.push(data.datox);
            yValues.push(data.total);
        });

        for (let index = 0; index < Object.keys(data).length; index++) {
            colors.push(random_rgba());
        }



        var ctx = document.getElementById("graphic").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: xLabels,
                datasets: [{
                    label: nameLabal,
                    data: yValues,
                    backgroundColor: colors
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            ,



            onClick: function (e) {
                /*var activePoints = myChart.getElementsAtEvent(e);
                var selectedIndex = activePoints[0]._index; */
                /* alert(this.data.datasets[0].data[selectedIndex]);
                console.log(this.data.datasets[0].data[selectedIndex]);
                */
            }

        });

        document.getElementById('graphic').onclick = function (evt) {
            var activePoints = myChart.getElementsAtEventForMode(evt, 'point', myChart.options);
            var firstPoint = activePoints[0];
            var label = myChart.data.labels[firstPoint._index];
            var value = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
            console.log(label);
            var bottom = $(document).height() - $(window).height();
            $("HTML, BODY").animate({
                scrollTop: bottom
            }, 1000);
            $('#tableDetails').removeClass('invisible');
            //optionShow = label;
            getDataTable(label);
        };


    }

    function getDataTable(url) {
        console.log('listo para crear la tabla ' + url + ' opcion: ' + optionShow);

        if (optionShow == '1') {
            createTable(baseUrl + '/api/marcas');
        }
        else if (optionShow == '2') {
            if (url != undefined) {
                createTable(baseUrl + '/api/departamentos/' + url);
            }
            else {
                createTable(baseUrl + '/api/departamentos');
            }



        } else if (optionShow == '3') {
            createTable(baseUrl + '/api/combustibles');
        } else if (optionShow == '4') {
            createTable(baseUrl + '/api/modelos');
        }
    }

    function createTable(fromurl) {
        $('#tableDetails').DataTable({
            "bDestroy": true,
            ajax: {
                method: "GET",
                url: fromurl,
                dataSrc: ""

            },
            columns: [
                { "data": "datox" },
                { "data": "total" }
            ]
        });
    }

});