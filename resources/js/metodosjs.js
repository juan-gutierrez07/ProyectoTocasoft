$(document).ready(function() {
    $("#eliminar").click(function() {
        // $.ajax({
        //     url : '/imagensitio/destroy/',
        //     data : { images : 123 },
        //     type : 'GET',
        //     dataType : 'json',
        //     success : function(json) {
        //         $('<h1/>').text(json.title).appendTo('body');
        //         $('<div class="content"/>')
        //             .html(json.html).appendTo('body');
        //     },
        //     error : function(xhr, status) {
        //         alert('Disculpe, existió un problema');
        //     },
        //     complete : function(xhr, status) {
        //         alert('Petición realizada');
        //     }
        // });
        var imagen = document.getElementById('eliminar').parentNode.parentNode.parentNode;
        imagen.removeChild(document.getElementById('eliminar').parentNode.parentNode);

      });
});