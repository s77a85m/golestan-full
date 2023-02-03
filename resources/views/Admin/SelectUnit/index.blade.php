@extends('Admin.layout.master')

@section('content')

    <!--            title this file changed py to pt -->
    <div class="w-full flex flex-row justify-between items-center px-3 pt-4">
        <span class="text-style font-light">انتخاب واحد</span>
        <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
        @include('Admin.alerts.alerts')
    </div>
    <!--            content in this file changed py to pb -->
    <div class="w-full pb-5 px-10 h-full flex justify-start flex-col">
        <!--        table -->
        <div class="flex flex-col gap-3">
            <div class="w-full flex flex-row justify-between">
                <div class="flex items-end"><span class="text-xs font-light">ایجاد انتخاب واحد</span></div>
            </div>
            <div class=" w-full py-2 bg-gray-100 rounded-md overflow-hidden shadow-md">
                <div class="w-full flex flex-row">
                    <!--                right items -->
                    <form id="right_form" method="post" action="{{route('admin.selectUnit.store')}}" class="flex-1 flex flex-col gap-2 p-3">
                        @csrf
                        <div><span class="text-xs font-bold">رشته و گرایش</span></div>
                        <!--                  field and gerayesh-->
                        <div class="flex justify-between pb-3 flex-row border-b border-gray-300 border-dashed">
                            <!--                    field-->
                            <div class="">
                                <label for="major" class="text-xs after:content-['*'] after:text-red-500">رشته</label>
                                <select name="major" id="major" class="px-2 w-52 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                    @foreach($majors as $major)
                                        <option value="{{$major->id}}">{{$major->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--                    gereyesh -->
                            <div class="">
                                <label for="orientation" class="text-xs after:content-['*'] after:text-red-500">گرایش</label>
                                <select name="orientation" id="orientation" class="px-2 w-52 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                    @foreach($orientations as $orientation)
                                        <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--                  order and time -->
                        <div><span class="text-xs font-bold">سال و نوبت</span></div>
                        <div class="flex gap-10 flex-row pb-2 border-b border-gray-300 border-dashed">
                            <!--                    year-->
                            <div class="">
                                <label for="year" class="text-xs after:content-['*'] after:text-red-500">سال</label>
                                <select name="year" id="year" class="px-2 w-20 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                    @for($i = 1400; $i<1410; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <!--                    order -->
                            <div class="">
                                <label for="order" class="text-xs after:content-['*'] after:text-red-500">نوبت</label>
                                <select name="order" id="order" class="px-2 w-16 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <!--                  start end status -->
                        <div><span class="text-xs font-bold">زمان شروع و اتمام</span></div>
                        <div class="flex gap-10 flex-row pb-2 border-b border-gray-300 border-dashed">
                            <!--                    year-->
                            <div class="">
                                <div class="text-xs">از  <input type="text"  class="h-7 alt-field-example px-2 outline-0 rounded-md border border-gray-300"><input name="start_at" class="alt-field-example-alt-field hidden" /> تا <input type="text"  class="h-7 alt-field-example-2 px-2 outline-0 rounded-md border border-gray-300"><input name="end_at" class="alt-field-example-alt-field-2 hidden" /></div>
                            </div>
                            {{-- status --}}
                            <div class="">
                                <label for="status" class="text-xs after:content-['*'] after:text-red-500">وضعیت</label>
                                <select name="status" id="status" class="px-2 w-24 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <button class="p-2 rounded-md bg-blue-500 text-white text-[9px] hover:shadow-md shadow-gray-400">اضافه کردن انتخاب واحد</button>
                        </div>
                    </form>
                    <!--                left items -->
                    <div class="flex-1 border-r border-gray-300 flex flex-col gap-2 p-3">
                        <div><span class="text-xs font-bold">ثبت دروس</span></div>
                        <form action="{{route('admin.UnitOfSelectUnit.store')}}" method="post" class="flex flex-row">
                            @csrf
                            <!--                    right of left-->
                            <div class=" border-l border-gray-300 flex-col flex gap-2">
                                <div class="mb-2"><span class="text-xs">درس</span></div>
                                <!--                      selectUnit -->
                                <div class="mt-3 flex flex-row gap-2 justify-end pl-5">
                                    <label for="selectUnit" class="text-xs  after:content-['*'] after:text-red-500">انتخاب واحد</label>
                                    <select name="selectUnit" id="selectUnit" class="px-2 w-52 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                        @foreach($selectUnits as $selectUnit)
                                            <option value="{{$selectUnit->id}}">{{$selectUnit->title}} - {{$selectUnit->orientation->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--                      title of unit -->
                                <div class="flex flex-row gap-2 justify-end pl-5">
                                    <label for="unit" class="text-xs after:content-['*'] after:text-red-500">نام درس</label>
                                    <select name="unit" id="unit" class="px-2 w-52 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->title}}-{{$unit->unit_num}}">{{$unit->title}}-{{$unit->unit_num}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--                      title of professor -->
                                <div class="mt-3 flex flex-row gap-2 justify-end pl-5">
                                    <label for="professor" class="text-xs  after:content-['*'] after:text-red-500">استاد</label>
                                    <select name="professor" id="professor" class="px-2 w-52 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                        @foreach($professors as $professor)
                                            <option value="{{$professor->id}}">{{$professor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- count --}}
                                <div class="mt-3 flex flex-row gap-2 justify-end pl-5">
                                    <span class="block text-xs">ظرفیت</span>
                                    <input type="text" name="count" id="count" class="h-7 w-28 px-2 outline-0 rounded-md border border-gray-300">
                                </div>
                                <!--                      submit unit -->
                                <div class="">
                                    <button class="p-2 rounded-md bg-blue-500 text-white text-[9px] hover:shadow-md shadow-gray-400">اضافه کردن درس</button>
                                </div>
                            </div>
                            <!--                    left of left-->
                            <div class="flex-1 flex-col pr-2 flex gap-2">
                                <div class="mb-2"><span class="text-xs">تاریخ کلاس و امتحان</span></div>
                                <!--                      time of day  -->
                                <div class="">
                                    <span class="block text-xs">تاریخ کلاس</span>
                                    <label for="saturday" class="text-xs">شنبه</label>
                                    <input name="days[]" value="شنبه" type="checkbox" id="saturday">
                                    <label for="sunday" class="text-xs">یکشنبه</label>
                                    <input name="days[]" value="یکشبنه" type="checkbox" id="sunday">
                                    <label for="monday" class="text-xs">دوشنبه</label>
                                    <input name="days[]" value="دوشنبه" type="checkbox" id="monday">
                                    <label for="tuesday" class="text-xs">سه شنبه</label>
                                    <input name="days[]" value="سه شنبه" type="checkbox" id="tuesday">
                                    <label for="wednesday" class="text-xs">چهارشنبه</label>
                                    <input name="days[]" value="چهارشبنه" type="checkbox" id="wednesday">
                                </div>
                                <!--                      time of houers -->
                                <div class=" flex flex-col gap-1">
                                    <span class="block text-xs">ساعت کلاس</span>
                                    <div class="text-xs">از  <input name="hour_class_start" type="text" class="h-7 w-12 px-2 outline-0 rounded-md border border-gray-300"> تا <input name="hour_class_end" type="text" class="h-7 w-12 px-2 outline-0 rounded-md border border-gray-300"></div>
                                </div>
                                <!--                      day of quiz -->
                                <div class=" flex flex-col gap-1">
                                    <span class="block text-xs">روز امتحان</span>
                                    <input type="text" name="day_quiz"  class="h-7 example w-1/2 px-2 text-xs outline-0 rounded-md border border-gray-300">
                                </div>
                                <!--                      hover of quiz -->
                                <div class=" flex flex-col gap-1">
                                    <span class="block text-xs">ساعت امتحان</span>
                                    <div class="text-xs">از  <input name="hour_quiz_start" type="text" class="h-7 w-12 px-2 outline-0 rounded-md border border-gray-300"> تا <input name="hour_quiz_end" type="text" class="h-7 w-12 px-2 outline-0 rounded-md border border-gray-300"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--          selected unit -->
        <div class="w-full shadow shadow-md mt-2 h-[150px] overflow-y-auto flex border border-gray-300  flex-col rounded-md bg-gray-100">
            <!--            list unit -->
            <table>
                <thead>
                <tr class="bg-gray-100 shadow-md text-xs sticky top-0">
                    <th class="py-2">ردیف</th>
                    <th class="">نام درس</th>
                    <th class="">شماره درس</th>
                    <th class="">تعداد واحد</th>
                    <th class="">استاد</th>
                    <th class="">تاریخ کلاس</th>
                    <th class="">تاریخ امتحان</th>
                    <th class="">فرآیند</th>
                </tr>
                </thead>
                <tbody class="overflow-scroll">
                @php
                    $count = 0;
                @endphp
                @foreach($unitOfSelectUnits as $unitOfSelectUnit)
                    @php($count++)
                    <tr class="text-center text-xs">
                        <td class="pt-2">{{$count}}</td>
                        <td>{{$unitOfSelectUnit->title}}</td>
                        <td>{{$unitOfSelectUnit->unit_num}}</td>
                        <td>{{$unitOfSelectUnit->count}}</td>
                        <td>{{$unitOfSelectUnit->professor->name}}</td>
                        <td>{{json_decode($unitOfSelectUnit->date_class)->days[0]}} , {{json_decode($unitOfSelectUnit->date_class)->days[1]}} {{json_decode($unitOfSelectUnit->date_class)->from}}-{{json_decode($unitOfSelectUnit->date_class)->to}}</td>
                        <td>{{json_decode($unitOfSelectUnit->date_quiz)->day}} {{json_decode($unitOfSelectUnit->date_quiz)->from}}-{{json_decode($unitOfSelectUnit->date_quiz)->to}}</td>
                        <td class="">
                            <form action="{{route('admin.UnitOfSelectUnit.delete', $unitOfSelectUnit)}}" method="post" class="h-full w-full flex-center">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-sm overflow-hidden flex w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 text-white bg-red-500 h-4">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('style')

    <link rel="stylesheet" href="{{asset('assets/css/persian-datepicker.css')}}"/>

@endsection

@section('script')

    <script src="{{asset('assets/js/persian-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/persian-date.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.alt-field-example').persianDatepicker({
                initialValue: false,
                altField: '.alt-field-example-alt-field',
                autoClose: true,
                timePicker: {
                    enabled: true,
                }
            });
            $('.alt-field-example-2').persianDatepicker({
                initialValue: false,
                altField: '.alt-field-example-alt-field-2',
                autoClose: true,
                timePicker: {
                    enabled: true,
                }
            });
            // day of quiz
            $('.example').persianDatepicker({
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
            });
        });

        //handle alert error
        let alert_error = document.getElementById('alert_error');
        if(alert_error != null){
            setTimeout(() => {
                alert_error.style.display = 'none';
            }, 2000000)
        }
        //handle alert status
        let alert_status = document.getElementById('alert_status');
        if(alert_status != null){
            setTimeout(() => {
                alert_status.style.display = 'none';
            }, 2000)
        }

        // close error
        function close_error(){
            let box_error = document.getElementById('box_error');
            box_error.style.display = 'none';
        }
    </script>

@endsection
