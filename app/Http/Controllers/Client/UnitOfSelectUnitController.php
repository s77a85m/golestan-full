<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\SelectUnit;
use App\Models\Admin\UnitOfSelectUnit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitOfSelectUnitController extends Controller
{
    public function index()
    {
        // get unitOf by orientation user
        $orientation = auth()->user()->orientation_id;
        $unitOfSelectUnits = UnitOfSelectUnit::whereHas('selectUnit', function (Builder $q) use ($orientation){
            $q->where('orientation_id', $orientation);
        })->get();

        return view('client.selectUnit.available', [
            'unitOfSelectUnits' => $unitOfSelectUnits
        ]);
    }
}
