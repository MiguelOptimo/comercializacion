{extends file='layout/index.tpl'}

{block name=content}
<div class="page">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Vista general</h3>
                </div>
                <div class="panel-body">
                    <a class="btn btn-primary btn-raised" href="Ped/">
                        Productos por agotarse <span class="badge">{$data.ordenes[0][0]}</span>
                    </a>
                    <a class="btn btn-danger btn-raised" href="Prd/">
                        Productos por caducar <span class="badge">{$data.reorden[0][0]}</span>
                    </a>
                    <a class="btn btn-success btn-raised" href="Rcp/">
                        Ventas realizadas <span class="badge">{rand(1,100)}</span>
                    </a>

                    <hr/>
                    <canvas id="canvas"></canvas>

                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Productos m&aacute;s vendidos</h3>
                </div>
                <div class="panel-body">

                    <!-- https://material.io/icons/ -->
                    <div class="list-group">
                        {foreach key=_item_index_ item=_item_dataRow_  from=$data.topventas }
                            {assign var="rcdprd"     value=$_item_dataRow_.rcdprd }
                            {assign var="prdnom"     value=$_item_dataRow_.prdnom }
                            {assign var="prdcan"     value=$_item_dataRow_.prdcan }
                            {assign var="prdimg"     value=$_item_dataRow_.prdimg }
                            <div class="list-group-item">
                                <div class="row-action-primary">
                                    <i class="material-icons"> {if $prdimg eq ""} photo {else}<img src="{$prdimg}" />{/if}</i>
                                </div>
                                <div class="row-content">
                                    <h4 class="list-group-item-heading">{$prdnom}</h4>

                                    <p class="list-group-item-text"><b>{$prdcan}</b> productos vendidos</p>
                                </div>
                            </div>
                            <div class="list-group-separator"></div>
                        {/foreach}

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{/block}

{block name=footer_content}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.bundle.min.js"></script>
<style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<script>
    jQuery(document).ready(function($) {

        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(231,233,237)'
        };

        window.randomScalingFactor = function() {
            return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
        }

        var MONTHS = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        var config = {
            type: 'line',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                datasets: [{
                    label: "Compras realizadas",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor()
                    ],
                    fill: false,
                }, {
                    label: "Ventas realizadas",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor(), 
                    randomScalingFactor()
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };


        var colorNames = Object.keys(window.chartColors);


    });

</script>
{/block}