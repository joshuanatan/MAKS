<script>
(function (global, factory) {
    if (typeof define === "function" && define.amd) {
        //define("/charts/chartjs", ["jquery", "Site"], factory);
    } 
    else if (typeof exports !== "undefined") {
        factory(require("jquery"), require("Site"));
    } 
    else {
        var mod = {
            exports: {}
        };
        factory(global.jQuery, global.Site);
        global.chartsChartjs = mod.exports;
    }
})(this, function (_jquery, _Site) {
"use strict";
_jquery = babelHelpers.interopRequireDefault(_jquery);
(0, _jquery.default)(document).ready(function ($$$1) {
    (0, _Site.run)();
});
Chart.defaults.global.responsive = true; // Example Chartjs Line
});
(function () {
    var barChartData = {
        labels: [],
        datasets: [
            {
                label: "Target",
                backgroundColor: "rgba(204, 213, 219, .2)",
                borderColor: Config.colors("blue-grey", 300),
                hoverBackgroundColor: "rgba(204, 213, 219, .3)",
                borderWidth: 2,
                data: [0,1,2]
            }, 
            {
                label: "Report",
                backgroundColor: "rgba(98, 168, 234, .2)",
                borderColor: Config.colors("primary", 600),
                hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                borderWidth: 2,
                data: [3,1,2]
            }
        ]
    };
    var myBar = new Chart(document.getElementById("exampleChartjsBar").getContext("2d"), {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: true
                }],
                yAxes: [{
                    display: true
                }]
            }
        }
    });
})(); 
(function () {
    var barChartData = {
        labels: [],
        datasets: [
            {
                label: "Target",
                backgroundColor: "rgba(204, 213, 219, .2)",
                borderColor: Config.colors("blue-grey", 300),
                hoverBackgroundColor: "rgba(204, 213, 219, .3)",
                borderWidth: 2,
                data: [0,1,2]
            }, 
            {
                label: "Report",
                backgroundColor: "rgba(98, 168, 234, .2)",
                borderColor: Config.colors("primary", 600),
                hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                borderWidth: 2,
                data: [3,1,2]
            }
        ]
    };
    var myBar = new Chart(document.getElementById("exampleChartjsBar2").getContext("2d"), {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: true
                }],
                yAxes: [{
                    display: true
                }]
            }
        }
    });
})(); 
(function () {
    var barChartData = {
        labels: [],
        datasets: [
            {
                label: "Target",
                backgroundColor: "rgba(204, 213, 219, .2)",
                borderColor: Config.colors("blue-grey", 300),
                hoverBackgroundColor: "rgba(204, 213, 219, .3)",
                borderWidth: 2,
                data: [0,1,2]
            }, 
            {
                label: "Report",
                backgroundColor: "rgba(98, 168, 234, .2)",
                borderColor: Config.colors("primary", 600),
                hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                borderWidth: 2,
                data: [3,1,2]
            }
        ]
    };
    var myBar = new Chart(document.getElementById("exampleChartjsBar3").getContext("2d"), {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: true
                }],
                yAxes: [{
                    display: true
                }]
            }
        }
    });
})(); 
(function () {
    var barChartData = {
        labels: [],
        datasets: [
            {
                label: "Target",
                backgroundColor: "rgba(204, 213, 219, .2)",
                borderColor: Config.colors("blue-grey", 300),
                hoverBackgroundColor: "rgba(204, 213, 219, .3)",
                borderWidth: 2,
                data: [0,1,2]
            }, 
            {
                label: "Report",
                backgroundColor: "rgba(98, 168, 234, .2)",
                borderColor: Config.colors("primary", 600),
                hoverBackgroundColor: "rgba(98, 168, 234, .3)",
                borderWidth: 2,
                data: [3,1,2]
            }
        ]
    };
    var myBar = new Chart(document.getElementById("exampleChartjsBar4").getContext("2d"), {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    display: true
                }],
                yAxes: [{
                    display: true
                }]
            }
        }
    });
})(); 

</script>