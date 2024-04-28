<?php

namespace App\Services;

use App\Models\Ecu;

class EcuService
{
    public function getFilteredAndSortedEcus($query, $sortBy, $sortDirection)
    {
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

        return $results->paginate(20);
    }
}
