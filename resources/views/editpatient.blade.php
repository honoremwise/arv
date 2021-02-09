@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                               <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <form method="POST" action="/Edit/<?php echo $patients[0]->id; ?>">
                        @csrf
                       <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right"> UID </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="uid" autofocus value="<?php echo
                                $patients[0]->uid; ?>" disabled>
                                                                                        </div>
                        </div>

                         <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Gender </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control"name="gender" autofocus value="<?php echo
                                $patients[0]->gender; ?>" disabled>
                                                                                        </div>
                            <div class="col-md-3">
                            <select type="text" class="form-control"name="gender" >
                                <option value=0>select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                             </div>

                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Location </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="location" autofocus value="<?php echo
                                $patients[0]->location_address; ?>" >
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">ARV Types </label>
                            <div class="col-md-6">
                            <input type="text" class="form-control"name="arvtype" autofocus value="<?php echo
                                $patients[0]->arv_type; ?>"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Date Of Birth </label>
                            <div class="col-md-3">
                                <input type="text" class="form-control"name="dob" autofocus value="<?php echo
                                $patients[0]->DoB; ?>" disabled> 
                                </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="dob" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Phone Number </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="Phone" autofocus value="<?php echo
                                $patients[0]->Phone; ?>"> 
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Stable/Unstable </label>
                            <div class="col-md-3">
                            <input type="text" class="form-control"name="Phone" autofocus value="<?php echo
                                $patients[0]->stability_status; ?>" disabled> 
                             </div>
                             <div class="col-md-3">
                            <select type="text" class="form-control"name="stability_status">
                                <option value=0>Select stability</option>
                                <option value="Stable">Stable</option>
                                <option value="Unstable">Unstable</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Refilling Schedule </label>
                            <div class="col-md-3">
                              <input type="text" class="form-control"name="refill_schedule" autofocus value="<?php echo
                                $patients[0]->refill_schedule; ?>" disabled>
                             </div>
                            <div class="col-md-3">
                                <select type="text" class="form-control"name="refill_schedule" >
                                <option value=0>Select</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Quartely">Quartely</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Referral Health Center </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="Referral_health_center" autofocus value="<?php echo
                                $patients[0]->Referral_health_center;?>"> 
                              
                             </div>
                        </div>

                                           <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                               Update
                                </button>
                             
                                <button type="submit" class="btn btn-primary">
                              <a href='/patients'><k style="color: white">Back</k></a>
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
