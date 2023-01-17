<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function reload(Request $request)
    {
        return response()->json([
            'imageSource' => captcha_src('flat'),
        ]);
    }
}
