<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\Grade;
use App\Models\Admin\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()){
            return redirect(route('dashboard.info'));
        }
        $grades = Grade::all();
        $majors = Major::all();
        return view('Home.index', [
            'grades' => $grades,
            'majors' => $majors
        ]);
    }

    public function orientation(Request $request)
    {

        $major = Major::find($request->get('major_id'));
        $orientations = $major->orientations;
        return response()->json([
            'orients' => $orientations
        ])->setStatusCode(200);
    }
}
