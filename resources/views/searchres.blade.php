
@extends('layouts.app')
@section('content')

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <div class="card">
          <div class="card-body">
           
          <div class="col-md-4"></div>
           
          <table class="table table-striped">
           <div class="panel panel-primary"> <th colspan="6"><center>Search results</center></th></div>
<tr>
<th>UID</th>
<th>Gender</th>
<th>Location</th>
<th>arv_type</th>
<th>Phone</th>
<th>stability_status</th>
</tr>
@if($patients->isNotEmpty())
 @foreach ($patients as $patients)
<tr>
<td>{{$patients['uid']}}</td>
<td>{{$patients['gender'] }}</td>
<td>{{$patients['location_address']}}</td>
<td>{{$patients['arv_type']}}</td>
<td>{{$patients['Phone']}}</td>
<td>{{$patients['stability_status']}}</td>
</tr>
 @endforeach
@else 

<tr><td colspan="6">No record found</td></tr>
@endif

</table>

            </div>
    </div></div>
</div>
@endsection
