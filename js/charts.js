function buildChart(param, objectId){
    $.ajax({
        url : "/ajax/callback.php",
        type: "GET",
        data: param
    })
        .done(function(dataArr){
            var ctx = document.getElementById(objectId).getContext('2d');

            var labelAray = [];
            var valueAray = [];

            jsonData = JSON.parse(dataArr);
            for(var i=0; i<Object.keys(jsonData).length; i++)
            {
                labelAray.push(jsonData[i].date);
                valueAray.push(Number(jsonData[i].val));
            }

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelAray,
                    datasets: [{
                        label: param.type,
                        data: valueAray,
                        backgroundColor: "rgba(153,255,51,0.3)"
                    }]
                }
            });
        });
}