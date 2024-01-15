/** FUNCIONES PARA MOSTRAR DATOS **/
  
function muestraGrafica(num, t_chart, tipo) {

	/* $('#tituloChart').html('');
	$('#tituloChart').html(t_chart); */

	if(tipo === 1) tipoGraf_Barras(num, t_chart);
	if(tipo === 2) tipoGraf_Pie(num, t_chart);
    if(tipo === 3) tipoGraf_columnasMulti(num, t_chart);
    if(tipo === 4) tipoGraf_Pie1(num, t_chart);
    if(tipo === 5) tipoGraf_Dashedline(num, t_chart);
    if(tipo === 6) tipoGraf_ColumnasPar(num, t_chart);

    $(".canvasjs-chart-credit").remove();
}

function tipoGraf_Barras(n, titulo) {
    var t_ejeY="";
    var t_leyenda="";
    var cont_name="chartContainer";

    if(n === 1 || n === 13 || n === 15) { t_ejeY="Número de registros"; t_leyenda="Partidos políticos"; }
    if(n === 3) { t_ejeY="Número de candidaturas"; t_leyenda="Rangos de edad"; }
    if(n === 15) cont_name+=n;

	var chart = new CanvasJS.Chart(cont_name, {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: titulo
        },
        axisY: {
            title: t_ejeY
        },
        dataPointMaxWidth: 80,
        data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "white",
            legendText: t_leyenda,
            dataPoints: chart_datos[n]
        }]
    });
    chart.render();
}

function tipoGraf_Pie(n, titulo) {
    var cont_name="chartContainer";

    if(n === 14) cont_name+=n;

    var chart = new CanvasJS.Chart(cont_name, {
        animationEnabled: true,

        title: {
            text: titulo
        },
        /* subtitles: [{
            text: "November 2017"}
        ], */
        
        data: [{
            type: "pie",
            yValueFormatString: "#,##0.00\"%\"",
            indexLabel: "{label} ({y})",
            dataPoints: chart_datos[n]
        }]

    });
    chart.render();

}

function tipoGraf_Pie1(n, titulo){
    var cont_name="chartContainer";
    var font_n=18;

    

    if ([19,20].includes(n)) { cont_name+=n; font_n=9; }
    if ([22,23,25,26,28,29,31,32,34,35,37,38].includes(n)) font_n=9;
    if ([22,25,28,31,34,37].includes(n)) cont_name+=19;
    if ([23,26,29,32,35,38].includes(n)) cont_name+=20;

    var chart = new CanvasJS.Chart(cont_name,
			{
				title: {
					text: titulo
				},
				animationEnabled: true,
				animationDuration: 1000,
				legend: {
					verticalAlign: "bottom",
					horizontalAlign: "center"
				},
				data: [
				{
					indexLabelFontSize: font_n,
					indexLabelFontFamily: "Monospace",
					indexLabelFontColor: "darkgrey",
					indexLabelLineColor: "darkgrey",
					indexLabelPlacement: "outside",
					type: "pie",
					showInLegend: true,
					toolTipContent: "{y} Personas - <strong>#percent%</strong>",
					dataPoints: chart_datos[n]
				}
				]
			});
			chart.render();
}

function tipoGraf_ColumnasPar(n, titulo) {
    var cont_name="chartContainer";
    
    if(n === 4) datos=chart_datos4;
    if(n === 16) datos=chart_datos16;
    if(n === 17) datos=chart_datos17;

    if(n === 16 || n === 17) cont_name+=n;
    
    var chart = new CanvasJS.Chart(cont_name, {
        animationEnabled: true,
        title:{
            text: titulo
        },	
        axisY: {
            title: "Mujeres",
            titleFontColor: "#C12E86",
            lineColor: "#C12E86",
            labelFontColor: "#C12E86",
            tickColor: "#C12E86"
        },
        axisY2: {
            title: "hombres",
            titleFontColor: "#2E3CC1",
            lineColor: "#2E3CC1",
            labelFontColor: "#2E3CC1",
            tickColor: "#2E3CC1"
        },	
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Cantidad mujeres",
            legendText: "Mujeres",
            showInLegend: true, 
            dataPoints: datos[1]
        },
        {
            type: "column",	
            name: "Canidad hombres",
            legendText: "Hombres",
            axisYType: "secondary",
            showInLegend: true,
            dataPoints: datos[2]
        }]
    });
    chart.render();
    
    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}

function tipoGraf_Dashedline(n, titulo) {
    var cont_name="chartContainer";
    
    if ([18,21,24,27,30,33,36].includes(n)) cont_name+=18;
    if(n === 18) datos=chart_datos18;
    if(n === 21) datos=chart_datos21;
    if(n === 24) datos=chart_datos24;
    if(n === 27) datos=chart_datos27;
    if(n === 30) datos=chart_datos30;
    if(n === 33) datos=chart_datos33;
    if(n === 36) datos=chart_datos36;
    
    var chart = new CanvasJS.Chart(cont_name, {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: titulo
        },
        axisX:{
            title: "Partidos",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Número de registros",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true
        },  
        legend:{
            cursor:"pointer",
            verticalAlign: "top",
            horizontalAlign: "left",
            dockInsidePlotArea: false,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Mujeres",
            markerType: "square",
            lineDashType: "dash",
            color: "#FF00FF",
            dataPoints: datos[1]
        },
        {
            type: "line",
            showInLegend: true,
            name: "Hombres",
            lineDashType: "dash",
            color: "blue",
            dataPoints: datos[2]
        },
        {
            type: "line",
            showInLegend: true,
            name: "No Binario",
            markerType: "square",
            lineDashType: "dash",
            color: "#88389C",
            dataPoints: datos[3]
        },
        {
            type: "line",
            showInLegend: true,
            name: "Otro Género",
            lineDashType: "dash",
            color: "#04AB77",
            dataPoints: datos[4]
        }]
    });
    chart.render();
    
    function toogleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
       
}


function tipoGraf_columnasMulti(n, titulo){
    var cont_name="chartContainer";
    
    if(n === 4) datos=chart_datos4;
    if(n === 16) datos=chart_datos16;
    if(n === 17) datos=chart_datos17;

    if(n === 16 || n === 17) cont_name+=n;
    var chart = new CanvasJS.Chart(cont_name, {
        animationEnabled: true,
        title:{
            text: titulo
        },
        axisY: {
            title: "Cantidad de registros",
            includeZero: true
        },
        legend: {
            cursor:"pointer",
            itemclick : toggleDataSeries
        },
        toolTip: {
            shared: true,
            content: toolTipFormatter
        },
        data: [{
            type: "bar",
            showInLegend: true,
            name: "Mujeres",
            color: "#FF00FF",
            dataPoints: datos[1]
        },
        {
            type: "bar",
            showInLegend: true,
            name: "Hombres",
            color: "blue",
            dataPoints: datos[2]
        },
        {
            type: "bar",
            showInLegend: true,
            name: "No Binario",
            color: "#88389C",
            dataPoints: datos[3]
        },
        {
            type: "bar",
            showInLegend: true,
            name: "Otro Género",
            color: "#04AB77",
            dataPoints: datos[4]
        }]
    });
    chart.render();
    
    function toolTipFormatter(e) {
        var str = "";
        var total = 0 ;
        var str3;
        var str2 ;
        for (var i = 0; i < e.entries.length; i++){
            var str1 = "<span style= \"color:"+e.entries[i].dataSeries.color + "\">" + e.entries[i].dataSeries.name + "</span>: <strong>"+  e.entries[i].dataPoint.y + "</strong> <br/>" ;
            total = e.entries[i].dataPoint.y + total;
            str = str.concat(str1);
        }
        str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
        str3 = "<span style = \"color:Tomato\">Total: </span><strong>" + total + "</strong><br/>";
        return (str2.concat(str)).concat(str3);
    }
    
    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}

