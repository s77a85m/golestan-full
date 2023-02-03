<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UnitOfSelectUnit;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class UnitOfSelectUnitController extends Controller
{
    public function store(Request $request)
    {
        try {
            $shams=$request->get('day_quiz');
            $output = convertChar($shams, 'persian', 'english');
            $converted_day_quiz = str_replace('/', '-', $output);

            //dd($request->all(), json_encode(['days' => $request->get('days'), 'from' => $request->get('hour_class_start'), 'to' => $request->get('hour_class_end')]));
            $title = explode('-', $request->get('unit'));
            // $title[0] is title , ...
            // date class
            $date_class = json_encode([
                'days' => $request->get('days'),
                'from' => $request->get('hour_class_start'),
                'to' => $request->get('hour_class_end')
            ], JSON_UNESCAPED_UNICODE);

            // date quiz
            $date_quiz = json_encode([
                'day' => $request->get('day_quiz'),
                'from' => $request->get('hour_quiz_start'),
                'to' => $request->get('hour_quiz_end')
            ], JSON_UNESCAPED_UNICODE);
            $data = UnitOfSelectUnit::query()->create([
                'title' => $title[0],
                'count' => $request->get('count'),
                'selectUnit_id' => $request->get('selectUnit'),
                'unit_num' => $title[1],
                'professor_id' => $request->get('professor'),
                'date_class' => $date_class,
                'date_quiz' => $date_quiz
            ]);
            return redirect()->back()->with('status', 'کلاس ایجاد شد');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'مشکلی در ایجا  کلاس به وجود آمده است.');
        }
    }

    public function destroy(UnitOfSelectUnit $unitOfSelectUnit)
    {
        $unitOfSelectUnit->delete();

        return redirect()->back();
    }
}
