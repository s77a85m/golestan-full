@extends('Admin.layout.master')

@section('content')

    <!--            title -->
    <div class="w-full flex flex-row justify-between items-center px-3 py-4">
        <span class="text-style font-bold">درس ها</span>
        <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
        @include('Admin.alerts.alerts')
    </div>
    <!--            content -->
    <div x-data="editRequest" class="w-full py-5 px-10 h-full flex justify-between flex-col">
        <!--        table -->
        <div x-data="newRequest" class="flex flex-col gap-3">
            <div class="w-full flex flex-row justify-between">
                <div class="flex items-end"><span class="text-xs font-bold">درس های ثبت شده</span></div>
                <div>
                    <button x-on:click="showForm = true"
                            class="p-3 hover:scale-95 transition-all ease-in-out duration-150 bg-blue-500 text-white text-xs shadow-md rounded-md">
                        درس جدید +
                    </button>
                </div>
            </div>
            <table class=" w-full bg-white rounded-md overflow-hidden shadow-md">
                <thead>
                <tr class="text-xs">
                    <th class="border-2 p-2 w-8 border-gray-300 border-t-0 border-b-0  border-l-0 border-r-0">ردیف</th>
                    <th class="border-2 p-2 w-8 border-gray-300 border-t-0 border-b-0 border-l-0">گروه</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">شماره درس</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">نام کامل درس</th>
                    <th class="border-2 w-4 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">واحد</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">پیشنیاز</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">رشته</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">فرآیند</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($units as $unit)
                        @php($count++)
                        <tr class="text-xs">
                            <td class="border-2 p-2 border-gray-300 border-r-0 border-b-0 border-l-0">{{$count}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$unit->unit_gp}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$unit->unit_num}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$unit->title}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$unit->unit_deg}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">@if($unit->unit_id != null){{$unit->parent->title}}@else ----@endif</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$unit->orientation->title}}</td>
                            <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">
                                <div class="flex justify-center items-center gap-2 flex-row">
                                    <!-- edit -->
                                    <button onclick="edit_unit('{{$unit->id}}')" x-on:click="editForm = true"  class="p-1 bg-amber-500 w-8 flex-center rounded-sm text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                        </svg>
                                    </button>
                                    <!-- delete -->
                                    <form class="p-1 w-8 bg-red-500 flex-center rounded-sm text-white" method="post" action="{{route('admin.unit.delete', $unit)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--        create new request -->
            <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-50 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-50 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-style inset-0 bg-gray-900 opacity-50">
            </div>
            <!--        request form -->
            <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-center inset-0 z-10">
                <div x-on:click.away="closeNewUnit()"
                     class="w-2/3 bg-gray-100 flex flex-col px-3 gap-10 relative rounded-md">
                    <div class="w-full"><span class="text-xs font-bold">درس جدید</span></div>
                    <form id="form-create-unit" action="{{route('admin.unit.create')}}" method="post" class="w-full flex gap-1 flex-col">
                        @csrf
                        <div class="w-full"><span class="text-xs font-bold">اطلاعات درس</span></div>
                        <div class="flex flex-col gap-3">
                            <div class="flex gap-2 flex-row">
                                <div class="flex-1 flex flex-col gap-3 ">
                                    <!--                    title -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="title" class="text-xs after:content-['*'] flex items-center after:text-red-500">نام درس</label>
                                        <input type="text" id="title" name="title" class="h-8 w-2/3 shadow-md px-2 text-xs outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                    field -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="orientation" class="text-xs after:content-['*'] after:text-red-500 flex items-center">گرایش</label>
                                        <select onchange="select_parent()" name="orientation" id="orientation" class="text-xs w-2/3 shadow-md px-2 rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>گرایش </option>
                                            @foreach($orientations as $orientation)
                                                <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                    number of unit -->
                                    <div class="flex flex-row gap-3 justify-start pr-24">
                                        <label for="numUnit" class="text-xs after:content-['*'] flex items-center after:text-red-500">تعداد واحد</label>
                                        <input type="text" id="numUnit" name="numUnit" class="h-8 text-xs w-16 px-2 shadow-md outline-0 rounded-md border border-gray-300">
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col gap-3">
                                    <!--                    number and group -->
                                    <div class="flex flex-row gap-3 justify-start">
                                        <!--                      number -->
                                        <div class="flex flex-row gap-3 justify-center">
                                            <label for="number" class="text-xs after:content-['*'] flex items-center after:text-red-500">شماره درس</label>
                                            <input type="text" id="number" name="number" class="h-8 text-xs w-40 px-2 shadow-md outline-0 rounded-md border border-gray-300">
                                        </div>
                                        <!--                      group -->
                                        <div class="flex flex-row gap-3 justify-center">
                                            <label for="group" class="text-xs after:content-['*'] flex items-center after:text-red-500">گروه</label>
                                            <input type="text" id="group" name="group" class="h-8 w-20 px-2 text-xs outline-0 shadow-md rounded-md border border-gray-300">
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-3 justify-start">
                                        <label for="parent" class="text-xs after:content-['*'] flex items-center after:text-red-500 flex items-center">پیشنیاز</label>
                                        <select name="parent" id="parent" class="text-xs w-2/3 px-2 rounded-md h-8 border shadow-md border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>پیشنیاز</option>
                                            <option value="1">طراحی الگوریتم</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="bg-green-500 px-3 py-2 hover:scale-95 transition-all duration-150 ease-in-out text-white rounded-md">
                                    ایجاد
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--            close new request-->
                    <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeNewUnit()" viewBox="0 0 20 20"
                         fill="currentColor"
                         class="w-5 absolute rounded-full text-red-500 shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2  h-5">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>

            </div>
            <!--        end create request -->
            <!--        edit unit -->
            <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-50 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-50 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-style inset-0 bg-gray-900 opacity-50">
            </div>
            <!--        edit form -->
            <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-center inset-0 z-10">
                <div x-on:click.away="closeEditUnit()"
                     class="w-2/3 bg-gray-100 flex flex-col px-3 gap-10 relative rounded-md">
                    <div class="w-full"><span class="text-xs font-bold">درس جدید</span></div>
                    <form id="form-edit-unit" action="{{route('admin.unit.update', '')}}" method="post" class="w-full flex gap-1 flex-col">
                        @csrf
                        @method('PATCH')
                        <div class="w-full"><span class="text-xs font-bold">اطلاعات درس</span></div>
                        <div class="flex flex-col gap-3">
                            <div class="flex gap-2 flex-row">
                                <div class="flex-1 flex flex-col gap-3 ">
                                    <!--                    title -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_title" class="text-xs after:content-['*'] flex items-center after:text-red-500">نام درس</label>
                                        <input type="text" id="edit_title" name="title" class="h-8 w-2/3 shadow-md px-2 text-xs outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                    field -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_orientation" class="text-xs after:content-['*'] after:text-red-500 flex items-center">گرایش</label>
                                        <select onchange="select_edit_parent()" name="orientation" id="edit_orientation" class="text-xs w-2/3 shadow-md px-2 rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>گرایش </option>
                                            @foreach($orientations as $orientation)
                                                <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                    count of unit -->
                                    <div class="flex flex-row gap-3 justify-start pr-24">
                                        <label for="edit_numUnit" class="text-xs after:content-['*'] flex items-center after:text-red-500">تعداد واحد</label>
                                        <input type="text" id="edit_numUnit" name="numUnit" class="h-8 text-xs w-16 px-2 shadow-md outline-0 rounded-md border border-gray-300">
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col gap-3">
                                    <!--                    number and group -->
                                    <div class="flex flex-row gap-3 justify-start">
                                        <!--                      number -->
                                        <div class="flex flex-row gap-3 justify-center">
                                            <label for="edit_number" class="text-xs after:content-['*'] flex items-center after:text-red-500">شماره درس</label>
                                            <input type="text" id="edit_number" name="number" class="h-8 text-xs w-40 px-2 shadow-md outline-0 rounded-md border border-gray-300">
                                        </div>
                                        <!--                      group -->
                                        <div class="flex flex-row gap-3 justify-center">
                                            <label for="edit_group" class="text-xs after:content-['*'] flex items-center after:text-red-500">گروه</label>
                                            <input type="text" id="edit_group" name="group" class="h-8 w-20 px-2 text-xs outline-0 shadow-md rounded-md border border-gray-300">
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-3 justify-start">
                                        <label for="edit_parent" class="text-xs after:content-['*'] flex items-center after:text-red-500 flex items-center">پیشنیاز</label>
                                        <select name="parent" id="edit_parent" class="text-xs w-2/3 px-2 rounded-md h-8 border shadow-md border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>پیشنیاز</option>
                                            <option value="1">طراحی الگوریتم</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="bg-green-500 px-3 py-2 hover:scale-95 transition-all duration-150 ease-in-out text-white rounded-md">
                                    ویرایش
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--            close edit request-->
                    <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeEditUnit()" viewBox="0 0 20 20"
                         fill="currentColor"
                         class="w-5 absolute rounded-full text-red-500 shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2  h-5">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>

            </div>
            <!--        end edit request -->
        </div>
        <!--        paginate -->
        <div class="h-12 flex flex-row gap-2 justify-center">
            <div class="h-7 px-4 rounded-md bg-gray-300">قبلی</div>
            <div class="h-7 px-4 rounded-md bg-gray-300">1</div>
            <div class="h-7 px-4 rounded-md bg-gray-300">بعدی</div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        // handle create new
        function newRequest() {
            return {
                showForm: false,
                closeNewUnit(){
                    this.showForm = false
                    document.getElementById("form-create-unit").reset();
                }
            }
        }
        // handle edit unit
        function editRequest() {
            return {
                editForm: false,
                closeEditUnit(){
                    this.editForm = false
                    document.getElementById("form-edit-unit").reset();
                    let edit_orientation = document.getElementById("edit_orientation");
                    for(let i = 0; i < edit_orientation.options.length; i++){
                        edit_orientation.options[i].selected = false;
                    }
                }
            }
        }

        // handle get orient
        function select_parent(){
            let id = document.getElementById('orientation').value;
            $.ajax({
                type : 'get',
                url : '/get_unit_of_orientation',
                data : {
                    _token : "{{csrf_token()}}",
                    orient_id : id
                },
                success : function (data){
                    let select_parent = document.getElementById('parent');
                    select_parent.innerHTML = `<option selected >پیشنیاز</option>`;
                    for(let i = 0; i<data.units.length; i++){
                        let opt = document.createElement('option');
                        opt.value = data.units[i].id;
                        opt.innerHTML = data.units[i].title;
                        select_parent.appendChild(opt);
                    }
                },
                error : function (data){
                    console.log(data);
                },
            })
        }
        function select_edit_parent(){
            let id = document.getElementById('edit_orientation').value;
            $.ajax({
                type : 'get',
                url : '/get_unit_of_orientation',
                data : {
                    _token : "{{csrf_token()}}",
                    orient_id : id
                },
                success : function (data){
                    let select_parent = document.getElementById('edit_parent');
                    select_parent.innerHTML = `<option selected >پیشنیاز</option>`;
                    for(let i = 0; i<data.units.length; i++){
                        let opt = document.createElement('option');
                        opt.value = data.units[i].id;
                        opt.innerHTML = data.units[i].title;
                        select_parent.appendChild(opt);
                    }
                },
                error : function (data){
                    console.log(data);
                },
            })
        }

        //handle alert error
        let alert_error = document.getElementById('alert_error');
        if(alert_error != null){
            setTimeout(() => {
                alert_error.style.display = 'none';
            }, 2000)
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

        // load unit for edit
        function edit_unit(id){
            let edit_title = document.getElementById("edit_title");
            let edit_orientation = document.getElementById("edit_orientation");
            let edit_numUnit = document.getElementById("edit_numUnit");
            let edit_number = document.getElementById("edit_number");
            let edit_group = document.getElementById("edit_group");
            let edit_form = document.getElementById("form-edit-unit");
            let edit_parent = document.getElementById("edit_parent");
            $.ajax({
                type : 'get',
                url : '/show_old_unit',
                data : {
                    _token : '{{csrf_token()}}',
                    unit_id : id
                },
                success : function (data){
                    console.log(data.unit.unit_id);
                    edit_title.value = data.unit.title;
                    let option ;
                    for(let i = 0; i < edit_orientation.options.length; i++){
                        option = edit_orientation.options[i];
                        if(option.value == data.unit.orientation_id){
                            option.selected = true;
                        }
                    }
                    edit_numUnit.value = data.unit.unit_deg;
                    edit_number.value = data.unit.unit_num;
                    edit_group.value = data.unit.unit_gp

                    // edit action form
                    edit_form.action = 'http://127.0.0.1:8000/admin/units/update/'+id
                },
                error : function (data){
                    console.log(data);
                },
            })
        }
    </script>

@endsection
