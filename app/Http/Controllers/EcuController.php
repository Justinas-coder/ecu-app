<?php

namespace App\Http\Controllers;

use App\Models\Ecu;
use App\Services\EcuService;
use Illuminate\Http\Request;

class EcuController extends Controller
{
    public function __construct(protected EcuService $ecuService)
    {
    }

    public function index(Request $request)
    {
        $request->flash();
        $query = $request->input('query');
        $sortBy = $request->input('sort');
        $sortDirection = $request->input('direction');

        $ecus = $this->ecuService->getFilteredAndSortedEcus($query, $sortBy, $sortDirection);

        return view('dashboard', [
            'ecus' => $ecus
        ]);
    }}
