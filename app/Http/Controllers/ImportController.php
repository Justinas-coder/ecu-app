<?php

namespace App\Http\Controllers;

use App\Imports\EcuImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => ['required', 'file']
        ]);

        Excel::import(new EcuImport, $request->file('import_file'));

        return redirect('/index')->with('success', 'All good!');
    }
}
