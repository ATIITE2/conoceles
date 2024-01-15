function obtenDataTable(num) {
    $(".tabla_elem").removeClass('d-none');

    var grado = parseInt($( "#grado_aca" ).val());
    var rango_edad = parseInt($( "#rango_edad" ).val());
    var sexo = $("input[id='sexo']:checked").val();
    var actorPol = $("input[id='actorPol']:checked").val();
    sexo = (sexo === undefined) ? "" : parseInt(sexo);
    actorPol = (actorPol === undefined) ? "" : parseInt(actorPol);

    var en_espanol= {
        Processing: "Procesando...",
        lengthMenu: 'Se muestran _MENU_ registros por página',
        zeroRecords: 'Lo sentimos, no se encontró el registro',
        EmptyTable: "Ningún dato disponible en esta tabla",
        info: 'Mostrando página _PAGE_ de _PAGES_',
        infoEmpty: 'No hay registros',
        infoFiltered: '(filtrado de un total de _MAX_ registros)',
        InfoPostFix: "",
        search: 'Buscar en la lista:',
        //sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: { sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior"
                },
        oAria: { sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                sSortDescending: ": Activar para ordenar la columna de manera descendente"
            }
    };

    $("#listado_candidatos").DataTable({
        "destroy": true,
        "processing": true,
        "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
        "autoWidth": false,
        "lengthChange": true,
        "ordering": true,
        "pageLength": 5,
        "responsive": true,
        "scrollY":        250,
        "scrollX":        300,
        "deferRender":    true,
        "scroller":       true,
        "language": en_espanol,
        'ajax': {
            'url': "posts/d_tablas.php",
            'type': "POST",
            'data': { 'num': num,
                      'grado': grado,
                      'rango_edad': rango_edad,
                      'sexo': sexo,
                      'actorPol': actorPol },
            // 'dataSrc': ''
        },
        columns: [
            { data: 'id_user' },
            { data: 'nombres' },
            { data: 'cargo' },
            { data: 'afiliacion' },
            { data: 'edad' },
            { data: 'grad_academ' },
            { data: 'url_perfil' }
        ],
        columnDefs: [
            {   targets: "_all", className: "dt_clase_1",
                targets: 1,
                createdCell: function (td) {
                    $(td).css('font-weight','Bold');
                },
            },
            {
                targets: [2,3],
                createdCell: function (td) {
                    $(td).html(interp_dato(0,$(td).html()));
                }
            },
            {
                targets: 6,
                // createdCell: function (td, cellData, rowData, row, col) {
                createdCell: function (td) {
                    $(td).css('color', 'blue');
                    $(td).html(interp_dato(1,$(td).html()));
                }
            },  
        ],
        
    });

}

function interp_dato(x, dato){
    let resp ="";
    if(x === 0) resp= (dato) ? dato : "Sin definir";
    if(x === 1) resp="<a href ='perfiles/index.php?id="+dato+"'>Ver perfil de candidato"+dato+"<i class='fa fa-search'</i></a>";
    return resp;
}