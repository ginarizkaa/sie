<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

        // loading page
        	
        	var dps = [];

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "VISUAL DATA"
                },
                axisY: {
                    includeZero: true
                },
                axisX: {
                    title: "Nilai"
                },
                data: [{
                    type: "column",
                    dataPoints: dps
                }]
            });

            function dataMain(result){
                for (var q=0; q<result.length; q++) {
                    dps.push({
                        "label": result(q).A,
                        y: result[q].B
                    });
                }
                chart.render();
            }

            $.getJSON("result_adhoc.php", dataMain);
        
        //sampe sini


    </script>
<body>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>

</body>

</html>