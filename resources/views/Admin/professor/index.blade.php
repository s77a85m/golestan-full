@extends('Admin.layout.master')


@section('content')

    <!--            title -->
    <div class="w-full flex flex-row justify-between items-center px-3 py-4">
        <span class="text-style font-xs">اساتید</span>
        <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
        @include('Admin.alerts.alerts')
    </div>
    <!--            content -->
    <div x-data="editProfessor" class="w-full py-5 px-10 h-full flex justify-between flex-col">
        <!--        table -->
        <div x-data="newProfessor" class="flex flex-col gap-3">
            <div class="w-full flex flex-row justify-between">
                <div class="flex items-end"><span class="text-xs font-xs">لست اساتید</span></div>
                <div>
                    <button x-on:click="showForm = true"
                            class="p-3 hover:scale-95 transition-all ease-in-out duration-150 bg-blue-500 text-white text-xs shadow-md rounded-md">
                        ثبت استاد جدید +
                    </button>
                </div>
            </div>
            <table class=" w-full bg-white rounded-md overflow-hidden shadow-md">
                <thead>
                <tr class="text-xs">
                    <th class="border-2 p-2 w-8 border-gray-300 border-t-0 border-b-0  border-l-0 border-r-0">ردیف
                    </th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">تصویر</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">نام و نام خانوادگی</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">نام کاربری</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">شماره تماس</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">رشته</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">گرایش</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">درجه</th>
                    <th class="border-2 p-2 border-gray-300 border-t-0 border-b-0 border-l-0">فرآیند</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @php
                    $counter = 0;
                @endphp
                @foreach($professors as $professor)
                    @php
                        $counter++;
                    @endphp
                    <tr class="text-xs">
                        <td class="border-2 p-2 border-gray-300 border-r-0 border-b-0 border-l-0">{{$counter}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 flex-center border-l-0"><img src="{{asset('/storage/'.$professor->image)}}" class="w-20 h-20" alt=""></td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->name}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->username}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->phone}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->orientation->title}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->major->title}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">{{$professor->position->title}}</td>
                        <td class="border-2 p-2 border-gray-300 border-b-0 border-l-0">
                            <div class="flex justify-center items-center gap-2">
                                <!-- edit -->
                                <button onclick="edit_professor('{{$professor->id}}')" x-on:click="editForm = true" class="p-1 bg-amber-500 w-8 flex-center rounded-sm text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>
                                </button>
                                <!--                                delete -->
                                <form action="{{route('admin.professor.delete', $professor)}}" method="post" class="p-1 w-8 bg-red-500 flex-center rounded-sm text-white">
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
            <!--        create new professor -->
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
                <div x-on:click.away="closeNew()"
                     class="w-1/2 bg-gray-100 flex flex-col px-3 gap-10 relative rounded-md">
                    <div class="w-full"><span class="text-xs font-xs">جدید</span></div>
                    <form id="new-professor-form" action="{{route('admin.professor.store')}}" method="post" enctype="multipart/form-data" class="w-full flex gap-1 flex-col">
                        @csrf
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-row">
                                <div class="flex pl-2 gap-2 flex-1 flex-col">
                                    <!--                                        full name-->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="fullName" class="after:content-['*'] text-xs after:text-red-500">نام</label>
                                        <input type="text" id="fullName" name="fullName" class="h-8 w-2/3 px-2 text-xs outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                                        phone -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="phone" class="after:content-['*'] text-xs after:text-red-500">شماره تماس</label>
                                        <input type="text" id="phone" name="phone" class="h-8 w-2/3 text-xs px-2 outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                                        field -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="field" class="after:content-['*'] text-xs after:text-red-500 flex items-center">رشته</label>
                                        <select name="major" id="field" class="w-2/3 px-2 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>رشته </option>
                                            @foreach($majors as $major)
                                                <option value="{{$major->id}}">{{$major->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                                        orientation -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="orientation" class="after:content-['*'] text-xs after:text-red-500 flex items-center">گرایش</label>
                                        <select name="orientation" id="orientation" class="w-2/3 text-xs px-2 rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>گرایش </option>
                                            @foreach($orientations as $orientation)
                                                <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                                        degri -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="position" class="after:content-['*'] text-xs after:text-red-500 flex items-center">درجه</label>
                                        <select name="position" id="position" class="w-2/3 px-2 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>درجه </option>
                                            @foreach($positions as $position)
                                                <option value="{{$position->id}}">{{$position->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
{{--                                upload image --}}
                                <div class="flex-1">
                                    <label class="hover:cursor-pointer" for="image-input">
                                        <div id="uploaded-image" class="flex-center ">
                                            <img id="file-ip-1-preview" src="{{asset('assets/images/statics/user.jpg')}}" class="w-40 h-48" alt="user">
                                        </div>
                                    </label>
                                    <input onchange="showPreview(event);" accept="image/jpeg, image/png, image/jpg" id="image-input" type="file" name="image" class="invisible">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="bg-green-500 text-xs px-3 py-2 hover:scale-95 transition-all duration-150 ease-in-out text-white rounded-md">
                                    ثبت
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--            close new request-->
                    <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeNew()" viewBox="0 0 20 20"
                         fill="currentColor"
                         class="w-5 absolute rounded-full text-red-500 shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2  h-5">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>

            </div>
            <!--        end create request -->
            <!--        create new professor -->
            <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-50 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-50 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-style inset-0 bg-gray-900 opacity-50">
            </div>
            <!--        request form -->
            <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100 "
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 "
                 x-transition:leave-end="opacity-0 "
                 x-cloak class="fixed flex-center inset-0 z-10">
                <div
                     class="w-1/2 bg-gray-100 flex flex-col px-3 gap-10 relative rounded-md">
                    <div class="w-full"><span class="text-xs font-xs">جدید</span></div>
                    <form id="edit-professor-form" action="{{route('admin.professor.update', 0)}}" method="post" enctype="multipart/form-data" class="w-full flex gap-1 flex-col">
                        @method('PATCH')
                        @csrf
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-row">
                                <div class="flex pl-2 gap-2 flex-1 flex-col">
                                    <!--                                        full name-->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_fullName" class="after:content-['*'] text-xs after:text-red-500">نام</label>
                                        <input type="text" id="edit_fullName" name="fullName" class="h-8 w-2/3 px-2 text-xs outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                                        phone -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_phone" class="after:content-['*'] text-xs after:text-red-500">شماره تماس</label>
                                        <input type="text" id="edit_phone" name="phone" class="h-8 w-2/3 text-xs px-2 outline-0 rounded-md border border-gray-300">
                                    </div>
                                    <!--                                        field -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_major" class="after:content-['*'] text-xs after:text-red-500 flex items-center">رشته</label>
                                        <select name="major" id="edit_major" class="w-2/3 px-2 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>رشته </option>
                                            @foreach($majors as $major)
                                                <option value="{{$major->id}}">{{$major->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                                        orientation -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_orientation" class="after:content-['*'] text-xs after:text-red-500 flex items-center">گرایش</label>
                                        <select name="orientation" id="edit_orientation" class="w-2/3 text-xs px-2 rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>گرایش </option>
                                            @foreach($orientations as $orientation)
                                                <option value="{{$orientation->id}}">{{$orientation->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--                                        degri -->
                                    <div class="flex flex-row gap-3 justify-end">
                                        <label for="edit_position" class="after:content-['*'] text-xs after:text-red-500 flex items-center">درجه</label>
                                        <select name="position" id="edit_position" class="w-2/3 px-2 text-xs rounded-md h-8 border border-gray-300 focus:ring-0 focus:outline-none">
                                            <option selected disabled>درجه </option>
                                            @foreach($positions as $position)
                                                <option value="{{$position->id}}">{{$position->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--                                upload image --}}
                                <div class="flex-1">
                                    <label class="hover:cursor-pointer" for="image-input-edit">
                                        <div id="uploaded-image" class="flex-center ">
                                            <img id="file-ip-1-preview-edit" src="{{asset('assets/images/statics/user.jpg')}}" class="w-40 h-48" alt="user">
                                        </div>
                                    </label>
                                    <input onchange="showPreviewEdit(event)" accept="image/jpeg, image/png, image/jpg" id="image-input-edit" type="file" name="image" class="invisible">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="bg-green-500 text-xs px-3 py-2 hover:scale-95 transition-all duration-150 ease-in-out text-white rounded-md">
                                    ویرایش
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--            close new request-->
                    <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeEdit()" viewBox="0 0 20 20"
                         fill="currentColor"
                         class="w-5 absolute rounded-full text-red-500 shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2  h-5">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>

            </div>
            <!--        end create request -->
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
        // handle create newProfessor
        function newProfessor() {
            return {
                showForm: false,
                closeNew(){
                    this.showForm = false
                    document.getElementById("new-professor-form").reset();
                    document.getElementById("file-ip-1-preview").src = "{{asset('assets/images/statics/user.jpg')}}";
                }
            }
        }

        // handle edit professor
        function editProfessor() {
            return {
                editForm: false,
                closeEdit(){
                    this.editForm = false
                    document.getElementById("edit-professor-form").reset();
                    document.getElementById("file-ip-1-preview").src = "{{asset('assets/images/statics/user.jpg')}}";
                    let edit_major = document.getElementById("edit_major");
                    for(let i = 0; i < edit_major.options.length; i++){
                        edit_major.options[i].selected = false;
                    }
                    let edit_orientation = document.getElementById("edit_orientation");
                    for(let i = 0; i < edit_orientation.options.length; i++){
                        edit_orientation.options[i].selected = false;
                    }
                    let edit_position = document.getElementById("edit_position");
                    for(let i = 0; i < edit_position.options.length; i++){
                        edit_position.options[i].selected = false;
                    }
                }
            }
        }

        //    upload image Professor
        // handle upload image professor new
        function showPreview(event){
            if(event.target.files.length > 0){
                let src = URL.createObjectURL(event.target.files[0]);
                let perview = document.getElementById("file-ip-1-preview");
                perview.src = src;
            }
        }
        // handle upload image professor edit
        function showPreviewEdit(event){
            console.log('image')
            if(event.target.files.length > 0){
                let src = URL.createObjectURL(event.target.files[0]);
                let perview = document.getElementById("file-ip-1-preview-edit");
                perview.src = src;
            }
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
        function edit_professor(id){
            let edit_fullName = document.getElementById("edit_fullName");
            let edit_phone = document.getElementById("edit_phone");
            let edit_major = document.getElementById("edit_major");
            let edit_orientation = document.getElementById("edit_orientation");
            let edit_file = document.getElementById("file-ip-1-preview-edit");
            let edit_position = document.getElementById("edit_position");
            let edit_form = document.getElementById("edit-professor-form");
            let edit_parent = document.getElementById("edit_parent");
            $.ajax({
                type : 'get',
                url : '/show_old_professor',
                data : {
                    _token : '{{csrf_token()}}',
                    professor_id : id
                },
                success : function (data){
                    edit_fullName.value = data.professor.name;
                    edit_phone.value = data.professor.phone;
                    edit_file.src = `http://127.0.0.1:8000/storage/${data.professor.image}`;
                    let option1 ;
                    for(let i = 0; i < edit_orientation.options.length; i++){
                        option1 = edit_orientation.options[i];
                        if(option1.value == data.professor.orientation_id){
                            option1.selected = true;
                        }
                    }
                    let option2 ;
                    for(let i = 0; i < edit_major.options.length; i++){
                        option2 = edit_major.options[i];
                        if(option2.value == data.professor.major_id){
                            option2.selected = true;
                        }
                    }
                    let option3 ;
                    for(let i = 0; i < edit_position.options.length; i++){
                        option3 = edit_position.options[i];
                        if(option3.value == data.professor.position_id){
                            option3.selected = true;
                        }
                    }

                    // edit action form
                    edit_form.action = 'http://127.0.0.1:8000/admin/professors/update/'+id
                },
                error : function (data){
                    console.log(data);
                },
            })
        }
    </script>

@endsection
