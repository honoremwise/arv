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
                <th colspan="6"><center>ARV Users</center></th>
<tr>
<th>Name</th>
<th>User Role</th>
<th>Email</th>
<th>Options</th>
</tr>
@foreach ($allUser ?? '' as $users)
<tr>
<td>{{$users['name']}}</td>
<td>{{$users['user_role'] }}</td>
<td>{{$users['email']}}</td>
<td>
  <a href="del/{{$users['id']}}">Revoke Access</a> 

</td>
</tr>
@endforeach

</table>

            </div>
    </div></div>
</div>
@endsection
