@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card bg-light mt-3">
              <div class="card">
            <div class="card-header"> &nbsp;&nbsp;&nbsp;<a href="{{'/refill'}}" class="btn btn-primary btn-xs">Refill window</a>
            &nbsp;&nbsp;&nbsp;<a href="{{'/patients'}}" class="btn btn-primary btn-xs">All patients</a>
              &nbsp;&nbsp;&nbsp;<a href="{{'/importExportView'}}" class="btn btn-primary btn-xs">IMPORT VS Export</a>
            <!-- maximum year refilling period rage of next fill -->
            </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import patients Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Patients Data</a>
            </form>
        </div>
    </div>
</div>

@endsection
