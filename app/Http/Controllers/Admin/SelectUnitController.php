<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Major;
use App\Models\Admin\Orientation;
use App\Models\Admin\SelectUnit;
use App\Models\Admin\Unit;
use App\Models\Admin\UnitOfSelectUnit;
use App\Models\Client\Professor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class SelectUnitController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        $orientations = Orientation::all();
        $selectUnits = SelectUnit::all();
        $units = Unit::all();
        $professors = Professor::all();
        $unitOfSelectUnits = UnitOfSelectUnit::all();

        return view('Admin.SelectUnit.index', [
            'majors' => $majors,
            'orientations' => $orientations,
            'selectUnits' => $selectUnits,
            'professors' => $professors,
            'units' => $units,
            'unitOfSelectUnits' => $unitOfSelectUnits
        ]);
    }

    public function store(Request $request)
    {
        // change time to god format
        $timestamp_start = substr($request->get('start_at'), 0, -3);
        $timestamp_end = substr($request->get('end_at'), 0, -3);
        $date_start = Carbon::createFromTimestamp($timestamp_start)->toDateTimeString();
        $date_end = Carbon::createFromTimestamp($timestamp_end)->toDateTimeString();

        try {
            $title = $request->get('year').'-'.$request->get('order');
            $selectUnit = SelectUnit::query()->create([
                'title' => $title,
                'date_start' => $date_start,
                'date_end' => $date_end,
                'publish' => $request->get('status'),
                'major_id' => $request->get('major'),
                'orientation_id' => $request->get('orientation'),
            ]);
            return redirect()->back()->with(['status' => 'یک انتخاب واحد ایجاد شد.', 'selectUnit' => $selectUnit]);
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
