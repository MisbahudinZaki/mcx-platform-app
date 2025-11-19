document.addEventListener("DOMContentLoaded", function () {
    var options = {
        series: [
            {
                name: "Actual Position",
                data: [20, 22, 25, 21, 21, 21, 22, 25, 25, 27, 28, 32, 29, 31, 30, 33],
            },
            {
                name: "Forecast",
                data: [null, null, null, null, null, null, null, null, null, 28, 31, 38, 34, 33, 36, 38],
            },
        ],
        chart: {
            height: 280,
            type: "area",
            toolbar: { show: false },
            zoom: { enabled: false },
        },
        stroke: {
            curve: "smooth",
            width: [2.5, 2.5],
            dashArray: [0, 6], // kedua garis: solid dan putus-putus
            colors: ["#FF4D4D", "#6C63FF"],
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                stops: [0, 90, 100],
                colorStops: [
                    {
                        offset: 0,
                        color: "#FF4D4D",
                        opacity: 0.2,
                    },
                    {
                        offset: 100,
                        color: "#6C63FF",
                        opacity: 0.2,
                    },
                ],
            },
        },
        dataLabels: { enabled: false },
        grid: {
            borderColor: "#E0E0E0",
            strokeDashArray: 4,
        },
        tooltip: {
            theme: "light",
            y: {
                formatter: function (val) {
                    return val.toFixed(1) + "M";
                },
            },
        },
        xaxis: {
            categories: [
                "01", "02", "03", "04", "05", "08", "09", "10", "11", "12", "13", "15", "16",
            ],
            labels: {
                style: {
                    colors: "#888",
                    fontSize: "12px",
                },
            },
        },
        yaxis: {
            labels: {
                formatter: (val) => val + "M",
                style: {
                    colors: "#888",
                    fontSize: "12px",
                },
            },
        },
        legend: {
            position: "top",
            horizontalAlign: "left",
            markers: { radius: 12 },
            itemMargin: { horizontal: 10 },
        },
    };

    var chart = new ApexCharts(document.querySelector("#positionForecastChart"), options);
    chart.render();
});
