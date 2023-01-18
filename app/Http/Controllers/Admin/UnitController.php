<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Orientation;
use App\Models\Admin\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        $orientations = Orientation::all();

        return view('Admin.Unit.index', [
            'units' => $units,
            'orientations' => $orientations
        ]);
    }

    public function store(Request $request)
    {
        try {
            $unit = Unit::query()->create([
                'title' => $request->get('title'),
                'orientation_id' => $request->get('orientation'),
                'unit_gp' => $request->get('group'),
                'unit_num' => $request->get('number'),
                'unit_deg' => $request->get('numUnit')
            ]);
            if ($request->filled('parent')) {
                $parent_id = Unit::query()->where('id', $request->get('parent'))->firstOrFail()->id;
                $unit->unit_id = $parent_id;
                $unit->save();
            }
            return redirect()->back()->with('status', 'درس باموفقیت ایجاد شد.');
        }catch (\Exception $e){
            return redirect(route('admin.unit.index'))->with('error', 'مشکلی در ایجاد درس به وجود آمده است!!!');
        }
    }

    public function parents(Request $request)
    {
        $orientation = Orientation::find($request->get('orient_id'));
        $units = $orientation->units;

        return response()->json([
            'units' => $units,
        ])->setStatusCode(200);
    }
}
