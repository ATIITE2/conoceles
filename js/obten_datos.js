function muestraGrafica(num, t_chart, tipo) {

	/* $('#tituloChart').html('');
	$('#tituloChart').html(t_chart); */

	if(tipo === 1) tipoGraf_Barras(num, t_chart);
	if(tipo === 2) tipoGraf_Pie(num, t_chart);
	if(tipo === 3) tipoGraf_ColumnasPar(num, t_chart);
    if(tipo === 4) tipoGraf_Pie1(num, t_chart);
    if(tipo === 5) tipoGraf_Dashedline(num, t_chart);

}

function tipoGraf_Barras(n, titulo) {
    var t_ejeY="";
    var t_leyenda="";
    var cont_name="chartContainer";

    if(n === 1 || n === 15) { t_ejeY="Número de registros"; t_leyenda="Partidos políticos"; }
    if(n === 3) { t_ejeY="Número de candidaturas"; t_leyenda="Rangos de edad"; }
    if(n === 13) { t_ejeY="Porcentaje de registros"; t_leyenda="Partidos políticos"; }
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
    if ([22,23,25,26,28,29,31,32,34,35].includes(n)) font_n=9;
    if ([22,25,28,31,34].includes(n)) cont_name+=19;
    if ([23,26,29,32,35].includes(n)) cont_name+=20;

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
    
    if ([18,21,24,27,30,33].includes(n)) cont_name+=18;
    if(n === 18) datos=chart_datos18;
    if(n === 21) datos=chart_datos21;
    if(n === 24) datos=chart_datos24;
    if(n === 27) datos=chart_datos27;
    if(n === 30) datos=chart_datos30;
    if(n === 33) datos=chart_datos33;
    
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
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Mujeres",
            markerType: "square",
            color: "#FF00FF",
            dataPoints: datos[1]
        },
        {
            type: "line",
            showInLegend: true,
            name: "Hombres",
            // lineDashType: "dash",
            color: "#00AAE4",
            dataPoints: datos[2]
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

