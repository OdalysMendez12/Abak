$(document).ready(function() {
    $('#miTabla').DataTable({
        "language": {
            "sSearch": "Buscar",
            "sEmptyTable": "No hay datos en la tabla",
            "sZeroRecords": "No se encontraron resultados",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "SInfoEmpty": "Mostrando registros del 0 al 10 de un total de 0",
            "sInfoFiltered":"(filtrandro de un total de _MAX_ registros",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sLoadingRecords":"Cargando...",
            "sLengthMenu": "Mostrar _MENU_ registros"
            }
    });
    });
