@extends('Client.layout.master')


@section('content')

    <!--            title -->
    <div class="flex flex-row items-center justify-between w-full px-3 py-4">
        <span class=" text-style">دروس ارائه شده {{auth()->user()->orientation->title}}</span>
        <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
    </div>
    <!--            content -->
    <div class="flex flex-col justify-between w-full h-full px-10 py-5">
        <!--        table -->
        <div>
            <table class="w-full overflow-hidden bg-white rounded-md shadow-md ">
                <thead>
                <tr class="text-xs font-bold">
                    <th class="w-8 border-2 border-t-0 border-b-0 border-l-0 border-r-0 border-gray-500">
                        ردیف
                    </th>
                    <th class="border-2 py-2 border-t-0 border-b-0 border-l-0 border-gray-500">گروه-شماره</th>
                    <th class="border-2 border-t-0 border-b-0 border-l-0 border-gray-500">نام درس</th>
                    <th class="border-2 border-t-0 border-b-0 border-l-0 border-gray-500">استاد</th>
                    <th class="border-2 border-t-0 border-b-0 border-l-0 border-gray-500">تاریخ کلاس</th>
                    <th class="border-2 border-t-0 border-b-0 border-l-0 border-gray-500">تاریخ امتحان</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @php($count = 0)
                @foreach($unitOfSelectUnits as $unitOfSelectUnit)
                    @php($count++)
                    <tr class="text-xs">
                        <td class="border-2 border-b-0 border-l-0 border-r-0 border-gray-500">{{$count}}</td>
                        <td class="border-2 border-b-0 border-l-0 border-gray-500">{{$unitOfSelectUnit->unit_num}}-1</td>
                        <td class="border-2 border-b-0 border-l-0 border-gray-500">{{$unitOfSelectUnit->title}}</td>
                        <td class="border-2 border-b-0 border-l-0 border-gray-500">{{$unitOfSelectUnit->professor->name}}</td>
                        <td class="border-2 border-b-0 border-l-0 border-gray-500">{{json_decode($unitOfSelectUnit->date_class)->days[0]}} , {{json_decode($unitOfSelectUnit->date_class)->days[1]}} {{json_decode($unitOfSelectUnit->date_class)->from}}-{{json_decode($unitOfSelectUnit->date_class)->to}}</td>
                        <td class="flex flex-col items-center gap-2 border-2 border-b-0 border-l-0 border-gray-500">
                            <span>تاریخ: {{json_decode($unitOfSelectUnit->date_quiz)->day}}</span>
                            <span>ساعت: {{json_decode($unitOfSelectUnit->date_quiz)->from}}-{{json_decode($unitOfSelectUnit->date_quiz)->to}}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--        paginate -->
        <div class="flex flex-row justify-center h-12 gap-2">
            <div class="px-4 bg-gray-300 rounded-md h-7">قبلی</div>
            <div class="px-4 bg-gray-300 rounded-md h-7">1</div>
            <div class="px-4 bg-gray-300 rounded-md h-7">بعدی</div>
        </div>
    </div>

@endsection
