<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Major;
use App\Models\Admin\Orientation;
use App\Models\Admin\Position;
use App\Models\Client\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        $positions = Position::all();
        $orientations = Orientation::all();
        $majors = Major::all();

        return view('Admin.professor.index', [
            'professors' => $professors,
            'positions' => $positions,
            'orientations' => $orientations,
            'majors' => $majors
        ]);
    }

    public function store(Request $request)
    {
        try {
            $username = '000'.random_int(100000, 999999);
            $image_path = $request->file('image')->store('/professors/profile/'.$username, 'private');
            Professor::query()->create([
                'name' => $request->get('fullName'),
                'username' => (string) $username,
                'password' => bcrypt($username),
                'phone' => $request->get('phone'),
                'image' => $image_path,
                'major_id' => $request->get('major'),
                'orientation_id' => $request->get('orientation'),
                'position_id' => $request->get('position'),
            ]);
            return redirect(route('admin.professor.index'))->with('status', 'استاد جدید اضافه شد.');
        }catch (\Exception $e){
            return redirect(route('admin.professor.index'))->with('error', 'مشکلی در اضافه کردن استاد به وجود آمده است.');
        }
    }

    public function oldProfessor(Request $request)
    {
        $professor = Professor::find($request->get('professor_id'));
        return response()->json([
            'professor' => $professor
        ])->setStatusCode(200);
    }

    public function update(Request $request, Professor $professor)
    {
        $image = $professor->image;
        if ($request->hasFile('image')){
            Storage::disk('private')->delete($professor->image);
            $image = $request->file('image')->store('/professors/profile/'.$professor->username, 'private');
        }
        try {
            $professor->update([
                'name' => $request->get('fullName'),
                'phone' => $request->get('phone'),
                'image' => $image,
                'major_id' => $request->get('major', $professor->major_id),
                'orientation_id' => $request->get('orientation', $professor->orientation_id),
                'position_id' => $request->get('position', $professor->position_id),
            ]);

            return redirect()->back()->with('status', 'ویرایش انجام شد.');
        }catch (\Exception $e){
            return redirect(route('admin.professor.index'))->with('error', 'ویرایش انجام نشد.');
        }

    }

    public function destroy(Professor $professor)
    {
        Storage::disk('private')->delete($professor->image);
        $professor->delete();

        return redirect()->back()->with('status', 'با موفقیت حذف شد');
    }
}
