<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\PatientsImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

/**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'arvpatient.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new PatientsImport,request()->file('file'));

        return back();
    }
}
