var options = {
        series: [{
            name: "New Visitors",
            data: [68, 44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: "Unique Visitors",
            data: [51, 76, 85, 101, 98, 87, 105, 91, 114, 94]
        }],
        chart: {
            height: 330,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "20%",
                endingShape: "rounded",
                barCap: "round"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"]
        },
        colors: ["#1ccab8", "#2a76f4"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
            axisBorder: {
                show: !0,
                color: "#bec7e0"
            },
            axisTicks: {
                show: !0,
                color: "#bec7e0"
            }
        },
        yaxis: {
            title: {
                text: "Visitors"
            }
        },
        fill: {
            opacity: 1
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            strokeDashArray: 2.5
        },
        tooltip: {
            y: {
                formatter: function(t) {
                    return t + "k"
                }
            }
        }
    },
    chartMain = new ApexCharts(document.querySelector("#ana_dash_1"), options),
    
    optionsCircle = {
        chart: {
            type: "radialBar",
            height: 295,
            offsetY: -30,
            offsetX: 20
        },
        plotOptions: {
            radialBar: {
                inverseOrder: !0,
                hollow: {
                    margin: 5,
                    size: "55%",
                    background: "transparent"
                },
                track: {
                    show: !0,
                    background: "#ddd",
                    strokeWidth: "10%",
                    opacity: 1,
                    margin: 5
                },
                dataLabels: {
                    name: {
                        fontSize: "18px"
                    },
                    value: {
                        fontSize: "16px",
                        color: "#50649c"
                    }
                }
            }
        },
        series: [71, 63],
        labels: ["Domestic", "International"],
        legend: {
            show: !0,
            position: "bottom",
            offsetX: -40,
            offsetY: -5,
            formatter: function(t, e) {
                return t + " - " + e.w.globals.series[e.seriesIndex] + "%"
            }
        },
        stroke: {
            lineCap: "round"
        },
        colors: ["#2a76f4", "#38c4fa"]
    },
    chartCircle = new ApexCharts(document.querySelector("#circlechart"), optionsCircle),
    iteration = 11;

function getRandom() {
    var t = iteration;
    return (Math.sin(t / trigoStrength) * (t / trigoStrength) + t / trigoStrength + 1) * (2 * trigoStrength)
}

function getRangeRandom(t) {
    return Math.floor(Math.random() * (t.max - t.min + 1)) + t.min
}
window.setInterval(function() {
    iteration++, chartCircle.updateSeries([getRangeRandom({
        min: 10,
        max: 100
    }), getRangeRandom({
        min: 10,
        max: 100
    })])
}, 3e3), window.addEventListener("DOMContentLoaded", t => {
    chartMain.render(), chartCircle.render()
});