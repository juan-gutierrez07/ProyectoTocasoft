$(document).ready(function() {
    $('.card-body > table').DataTable({
        reponsive:true,
        autoWidth:false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por páginas",
            "zeroRecords": "Registro no encontrado !!",
            "info": "Mostrando la página  _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior",
            }

        }
    });


} );