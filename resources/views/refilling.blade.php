
@extends('layouts.app')
@section('content')

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <!-- <class="col-md-4 col-form-label text-md-right">records</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <form method="POST" action="/saverefills">
                        @csrf
                       <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right"> UID </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="UID" autofocus>
                                                                                        </div>
                        </div>
                   
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right"> Date of refill </label>
                            <div class="col-md-6">
                                <input type="date" class="form-control"name="refilldate" >
                             </div>
                        </div>
                        
                                           <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Record
                                </button>
                              </div>
                        </div>
                    </form>
                </div>
        </div>
        <div class="card">
          <div class="card-body">
          <table class="table table-striped">
<tr>
<th>UID</th>
<th>Refill Date</th>
<th>Next date of Refill</th>

</tr>
@foreach ($refillsdata ?? '' as $refills)
<tr>
<td>{{$refills['uid']}}</td>
<td>{{$refills['refillingdate'] }}</td>
<td>{{$refills['nextrefilldate']}}</td>

</tr>
@endforeach

</table>
                
            </div>
    </div></div>
</div>
@endsection


