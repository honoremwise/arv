@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">&nbsp;&nbsp;&nbsp;<a href="{{'/refill'}}" class="btn btn-primary btn-xs">Refill window</a>
                &nbsp;&nbsp;&nbsp;<a href="{{'/patients'}}" class="btn btn-primary btn-xs">All patients</a>
                  &nbsp;&nbsp;&nbsp;<a href="{{'/importExportView'}}" class="btn btn-primary btn-xs">IMPORT VS Export</a>
                <!-- maximum year refilling period rage of next fill -->
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <form method="POST" action="/patients">
                        @csrf
                       <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right"> UID </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="UID" autofocus>
                                                                                        </div>
                        </div>

                         <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Gender </label>
                            <div class="col-md-6">
                            <select type="text" class="form-control"name="gender" >
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                             </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Location </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="location_address" >
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">ARV Types </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="arvtype" >
                                                                                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Date Of Birth </label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="dob" >
                                                                                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Phone Number </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="Phone" >
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Stable/Unstable </label>
                            <div class="col-md-6">
                            <select type="text" class="form-control"name="stability_status">
                                <option>Stable</option>
                                <option>Unstable</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Refilling Schedule </label>
                            <div class="col-md-6">
                                <select type="text" class="form-control"name="refill_schedule" >
                                <option>Monthly</option>
                                <option>Quartely</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Referral Health Center </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="Referral_health_center" >
                             </div>
                        </div>

                                           <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                 Save
                                </button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
