<?php

namespace App\Http\Controllers;

use App\Models\Ecu;
use Illuminate\Http\Request;

class EcuController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $query = $request->input('query');
        $sortBy = $request->input('sort');
        $sortDirection = $request->input('direction');

        $results = Ecu::query();

        if ($sortDirection && $sortBy) {
            $results->orderBy($sortBy, $sortDirection);
        }

        if ($query) {
            // Perform search
            $results->where('dump_id', 'like', '%'.$query.'%')
                ->orWhere('ecu', 'like', '%'.$query.'%')
                ->orWhere('attribute', 'like', '%'.$query.'%')
                ->orWhere('value', 'like', '%'.$query.'%');
        }

        return view('dashboard', [
            'ecus' => $results->paginate(20)
        ]);
    }
}
