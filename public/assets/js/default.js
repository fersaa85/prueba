$(document).ready(function(){

    $("#formAdd").submit(function(e) {

        /* stop form from submitting normally */
        e.preventDefault();

        $.post( site_domine+"/api/dashboard/store", $( "#formAdd" ).serialize())
            .done(function( data ) {
            if(data.errors) {
                alert('Hay errores en el formulario por favor complete todos los campos');
            } else{
                $(".list").append(data.html);
            }

        }).fail(function() {
                alert( "error" );
         });


    });



    $("#formSearch").submit(function(e) {

        /* stop form from submitting normally */
        e.preventDefault();

        $.get( site_domine+"/api/dashboard/user", $( "#formSearch" ).serialize())
            .done(function( data ) {
                    $(".list").html('');
                    $(".list").append(data.html);
            }).fail(function() {
                alert( "error" );
            });


    });

});