$(document).ready(function () {
    var ctx = document.getElementById('myChart').getContext('2d');


    var paramArray = {"type":"temp", "date1":"2017-05-25", "date2":"2017-05-31"};

    $("#ok").click(function () {
        $.ajax({
            url : "http://test.com/handle.php",
            type: "GET",
            data: paramArray,
            success: successFunc
        });
    });

    function successFunc(dataArr) {
        var labelAray = [];
        var valueAray = [];
        jsonData = JSON.parse(dataArr);
        for(i=0; i<Object.keys(jsonData).length; i++)
        {
            labelAray.push(jsonData[i].date);
            valueAray.push(Number(jsonData[i].val));
        }

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelAray,
                datasets: [{
                    label: 'temperature',
                    data: valueAray,
                    backgroundColor: "rgba(153,255,51,0.3)"
                }]
            }
        });


    }
})