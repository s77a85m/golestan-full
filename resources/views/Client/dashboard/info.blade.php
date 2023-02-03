@extends('Client.layout.master')

@section('content')

    <!--            title -->
    <div class="flex flex-row items-center justify-between w-full px-3 py-4">
        <span class="font-bold text-style">اطلاعات جامع دانشجو</span>
        <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
    </div>
    <!--            content -->
    <div class="flex flex-col w-full px-10 py-5">
        <!--                info-->
        <div class="flex flex-row">
            <!--                info student -->
            <div class="flex flex-row w-2/3">
                <div class="flex font-iransans text-xs flex-col flex-1 gap-4">
                    <span>شماره دانشجویی : {{auth()->user()->stuNum}}</span>
                    <span>نام و نام خانوادگی : {{auth()->user()->firstname .' '. auth()->user()->lastname}}</span>
                    <span>مقطع تحصیلی : {{auth()->user()->grade->title}}</span>
                    <span>رشته تحصیلی : {{auth()->user()->major->title}}</span>
                </div>
                <div class="flex text-xs flex-col flex-1 gap-4">
                    <span>گرایش : {{auth()->user()->orientation->title}}</span>
                    <span>تعداد واحد گذرانده : 0</span>
                    <span>استاد راهنما : ----</span>
                </div>
            </div>
            <!--                avatar info -->
            <div class="flex items-start justify-center ">
                <img src="{{asset('storage/'.auth()->user()->avatar)}}" class="w-[10rem] h-[11rem] rounded-md"  alt="avatar">
            </div>
        </div>
        <!--               table-->
        <div class="w-full p-3 mt-12 bg-gray-300 rounded-md shadow-md">
            <table class="w-full overflow-hidden rounded-md">
                <thead class="border-b-8 border-gray-300">
                <tr class="text-xs text-center bg-white">
                    <th class="w-10 p-2 border-l-4 border-gray-300">ردیف</th>
                    <th class="p-2 border-l-4 border-gray-300">ترم</th>
                    <th class="p-2 border-l-4 border-gray-300">وضعیت ترم</th>
                    <th class="p-2 border-l-4 border-gray-300">اخذشده</th>
                    <th class="p-2 border-l-4 border-gray-300">حذف شده</th>
                    <th class="p-2 border-l-4 border-gray-300">رد شده</th>
                    <th class="p-2 ">مشروطی</th>
                </tr>
                </thead>
                <tbody class="mt-2 first:rounded-t-md">
                    <tr class="text-center text-xs border-b border-gray-300 odd:bg-gray-200 last:border-none even:bg-teal-50">
                        <td class="px-2 py-1 border-l-2 border-gray-300">1</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">1401-1</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">مشغول به تحصیل</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">12</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">0</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">0</td>
                        <td class="px-2 py-1 border-l-2 border-gray-300">---</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
