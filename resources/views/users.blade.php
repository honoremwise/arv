
@extends('layouts.app')
@section('content')

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <div class="card">
          <div class="card-body">
           
          <div class="col-md-4"></div>
           <form method="POST" action="/Searchp">
            @csrf
          <div class="form-group col-md-4">
            <label for="Search">Search:</label>
            <input type="text" class="form-control" placeholder="input patient code" name="search">
          </div> 
        <form>  
          <table class="table table-striped">
<tr>
<th>UID</th>
<th>Gender</th>
<th>Location</th>
<th>arv_type</th>
<th>Phone</th>
<th>stability_status</th>
</tr>
@foreach ($allpatients ?? '' as $patients)
<tr>
<td>{{$patients['uid']}}</td>
<td>{{$patients['gender'] }}</td>
<td>{{$patients['location_address']}}</td>
<td>{{$patients['arv_type']}}</td>
<td>{{$patients['Phone']}}</td>
<td>{{$patients['stability_status']}}</td>
</tr>
@endforeach

</table>

            </div>
    </div></div>
</div>
@endsection
