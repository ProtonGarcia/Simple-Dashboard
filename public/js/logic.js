'use strict'

function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ')';
}


var optionShow;

$(document).ready(function () {
 


    /**
     * Tabs
     */
    $('#tabs').tabs();

    

    /**
     * get links for fetch
     */
    $('[href = "#tabs-1"]').click(() => {
        console.log('click tab 1');
        $('#graficas2').empty();
        $('#graficas3').empty();
        $('#tableBody').empty();
        $('#tableDetails').addClass('invisible');
        $('#graficas1').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson('http://127.0.0.1:8000/api/marcas');

        optionShow = 1;


    });

    $('[href = "#tabs-2"]').click(() => {
        $('#graficas1').empty();
        $('#graficas3').empty();
        $('#tableBody').empty();
        $('#tableDetails').addClass('invisible');
        console.log('click tab 2');
        $('#graficas2').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson('http://127.0.0.1:8000/api/departamentos');

        optionShow = 2;


    });

    $('[href = "#tabs-3"]').click(() => {
        $('#graficas2').empty();
        $('#graficas1').empty();
        $('#tableBody').empty();
        $('#tableDetails').addClass('invisible');
        console.log('click tab 3');
        $('#graficas3').append('<canvas id="graphic" width="400" height="400"></canvas>');
        getJson('http://127.0.0.1:8000/api/combustibles');

        optionShow = 3;


    });


    /**
     * Graficas
     */

    function getJson(url) {
        console.log(url);
        fetch(url)
            .then(response => response.json())
            .then(data => {
                graficar(data.data);
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
                    label: "",
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
            $("html, body").animate({ scrollTop: $('#tableDetails').offset().top }, 1000);
            $('#tableDetails').removeClass('invisible');
            //optionShow = label;
            getDataTable(label);
        };
    }

    function getDataTable(url) {
        console.log('listo para crear la tabla ' + url + ' opcion: ' + optionShow);

        var query;
        var name;

        if (optionShow == '1') {
            query = 'http://127.0.0.1:8000/api/marcas';
            name = "Modelos";
            if (query != '') {
                fetch(query)
                    .then(data => data.json())
                    .then(data => {
                        createTable(data.data, name);
                    });
            }
        }
        else if (optionShow == '2') {
            query = 'http://127.0.0.1:8000/api/departamentos/' + url;
            name = "Municipios";

            if (query != '') {
                fetch(query)
                    .then(data => data.json())
                    .then(data => {
                        createTable(data, name);
                    });
            }
        } else if (optionShow == '3') {
            query = 'http://127.0.0.1:8000/api/combustibles';
            name = "Combustible";
            if (query != '') {
                fetch(query)
                    .then(data => data.json())
                    .then(data => {
                        createTable(data.data, name);
                    });
            }
        }



    }

    function createTable(data, name) {
        console.log(data, name);
        $('#tableBody').empty();
        const tableRow = document.getElementById('tableBody');



        data.forEach(index => {
            tableRow.innerHTML += `<tr>
            <td>${index.datox}</td>
            <td>${index.total}</td>
            
        </tr>
            `;
        });
    }

});