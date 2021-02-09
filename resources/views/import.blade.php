@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card bg-light mt-3">
              <div class="card">
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control" required accept=".xls,.csv,.xlsx">
                <br>
                <button class="btn btn-info">Import patients Data</button>
                <a class="btn btn-info" href="{{ route('export') }}">Export Patients Data</a>
            </form>
        </div>
    </div>
</div>

@endsection
