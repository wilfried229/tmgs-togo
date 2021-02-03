@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var voieSites = <?php echo $voieSites; ?>;

var recetesVoiesWeek1 = <?php echo $recetesVoiesWeek1; ?>;
var recetesVoiesWeek2 = <?php echo $recetesVoiesWeek2; ?>;
var recetesVoiesWeek3 = <?php echo $recetesVoiesWeek3; ?>;
var recetesVoiesWeek4 = <?php echo $recetesVoiesWeek4; ?>;


    var barChartData1 = {
        labels: voieSites,
        datasets: [{
            label: 'Voie',
            backgroundColor: "blue",
            data: recetesVoiesWeek1
        }]
    };

    var barChartData2 = {
        labels: voieSites,
        datasets: [{
            label: 'Voie',
            backgroundColor: "blue",
            data: recetesVoiesWeek2
        }]
    };
    var barChartData3 = {
        labels: voieSites,
        datasets: [{
            label: 'Voie',
            backgroundColor: "blue",
            data: recetesVoiesWeek3
        }]
    };

    var barChartData4 = {
        labels: voieSites,
        datasets: [{
            label: 'Voie',
            backgroundColor: "blue",
            data: recetesVoiesWeek4
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        var ctx2 = document.getElementById("canvas2").getContext("2d");

        var ctx3 = document.getElementById("canvas3").getContext("2d");
        var ctx4 = document.getElementById("canvas4").getContext("2d");


        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData1,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Recettes / Voie'
                }
            }
        });

        window.myBar = new Chart(ctx2, {
            type: 'bar',
            data: barChartData2,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Recettes / Voie'
                }
            }
        });
        window.myBar = new Chart(ctx3, {
            type: 'bar',
            data: barChartData3,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Recettes / Voie'
                }
            }
        });
        window.myBar = new Chart(ctx4, {
            type: 'bar',
            data: barChartData4,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Recettes / Voie'
                }
            }
        });
    };
</script>
@endsection
