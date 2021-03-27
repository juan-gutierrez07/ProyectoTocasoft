@if (session('status_success'))
 <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     {{ session('status_success') }}
 </div>
@endif

@if ($errors->any())
 <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button> 
    <ul>
        @foreach($errors->all() as $error) 
         <li>{{ $error }}</li>
        @endforeach
     </ul>
 </div>
@endif