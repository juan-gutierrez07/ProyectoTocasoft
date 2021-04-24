@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mt-4">Registrar imagenes</h1>
    <div class="mt-5 row justify-content-center">
            @include('establecimientos.message')
        <div class="col-md-9 col-xs-12 card card-body">
            <fieldset class="border p-4">
                    <legend class="text-primary">Imagenes Sitio</legend>
                    <div class="form-group">
                            <label for="imagenes">Imagenes</label>
                            <div id="dropzone" class="dropzone form-control"></div>
                        </div>
                <input type="hidden" id="uuid" name="uuid" value={{ $nuevo->uuid}}>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Terminar</a>
            </fieldset>    
        </div>
    </div>
</div>
@endsection
<script> 
    
   function categoria()
        {
            console.log('dasd');
        //     var categoria = $("#categoria").val();
        // $.ajax({
        //         type : 'POST',
        //         url : '/categoria/sitios/',
        //         data : categoria,
        //         success: function(response){
        //             console.log(response);
        //             $("sitio").html(response);
        //         }           
        // });
         }
    

    
</script>        

