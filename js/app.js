$(document).ready(function () {

    $("#temp").click(function () {
        var queryParam = {
            "type":"temp",
            "date1":"2017-05-25"
        };
        buildChart(queryParam, "myChart");
    });

    $("#weight").click(function () {
        var queryParam = {
            "type":"weight",
            "date1":"2017-05-25",
            "date2":"2017-06-24"
        };
        buildChart(queryParam, "myChart");
    });
});