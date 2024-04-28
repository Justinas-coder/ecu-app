<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $ecuTypesWithCount = DB::table('ecus')
            ->select('ecu', DB::raw('COUNT(*) as count'))
            ->groupBy('ecu')
            ->get();

        return view('report', [
            'ecuData' => $ecuTypesWithCount
        ]);
    }
}
