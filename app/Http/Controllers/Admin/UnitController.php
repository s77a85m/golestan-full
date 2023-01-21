<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUnitRequest;
use App\Http\Requests\EditUnitReqest;
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

    public function store(CreateUnitRequest $request)
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
                $unit_is = Unit::query()->where('id', $request->get('parent'))->first();
                if ($unit_is != null){
                    $parent_id =$unit_is->id;
                }else{
                    $parent_id = null;
                }
                $unit->unit_id = $parent_id;
                $unit->save();
            }
            return redirect()->back()->with('status', 'درس باموفقیت ایجاد شد.');
        }catch (\Exception $e){
            return redirect(route('admin.unit.index'))->with('error', 'مشکلی در ایجاد درس بوجود آمده است!!!');
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

    public function oldUnit(Request $request)
    {
        $unit = Unit::find($request->get('unit_id'));
        return response()->json([
                'unit' => $unit
        ])->setStatusCode(200);
    }

    public function update(EditUnitReqest $request, Unit $unit)
    {
        $unit_is = Unit::query()->where('unit_num', $request->get('number'))
            ->where('id', '!=', $unit->id)->exists();
        if ($unit_is){
            return redirect()->back()->withErrors(['number' => 'این شماره درس قبلا استفاده شده است.']);
        }
        try {
            $unit->update([
                'title' => $request->get('title', $unit->title),
                'orientation_id' => $request->get('orientation', $unit->orientation_id),
                'unit_gp' => $request->get('group', $unit->unit_gp),
                'unit_num' => $request->get('number', $unit->unit_num),
                'unit_deg' => $request->get('numUnit', $unit->unit_deg)
            ]);
            if ($request->filled('parent')) {
                $unit_is = Unit::query()->where('id', $request->get('parent'))->first();
                if ($unit_is != null){
                    $parent_id = $unit_is->id;
                }else{
                    $parent_id = null;
                }
                $unit->unit_id = $parent_id;
                $unit->save();
            }
            return redirect()->back()->with('status', 'ویرایش انجام شد.');
        }catch (\Exception $e){
            return redirect(route('admin.unit.index'))->with('error', 'مشکلی به وجود آمده است لطفا بعدا تلاش کنید.');
        }
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->back();
    }
}


