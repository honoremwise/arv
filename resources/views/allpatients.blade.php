
@extends('layouts.app')
@section('content')

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <div class="card">

              <div class="card-header">&nbsp;&nbsp;&nbsp;<a href="{{'/refill'}}" class="btn btn-primary btn-xs">Refill window</a>
              &nbsp;&nbsp;&nbsp;<a href="{{'/patients'}}" class="btn btn-primary btn-xs">All patients</a>
                &nbsp;&nbsp;&nbsp;<a href="{{'/importExportView'}}" class="btn btn-primary btn-xs">IMPORT VS Export</a>
              <!-- maximum year refilling period rage of next fill -->
              </div>
          <div class="card-body">
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
