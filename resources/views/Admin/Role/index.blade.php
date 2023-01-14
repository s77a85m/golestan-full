@extends('Admin.layout.master')

@section('content')

    <div class="m-5 bg-gray-200 h-[600px] flex flex-col rounded-md ">
        <!--            title -->
        <div class="flex flex-row items-center justify-between w-full px-3 py-4">
            <span class="font-bold font-iransans text-style">نقش ها</span>
            <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="w-9 h-9" alt="IUT">
        </div>
        <!--            content -->
        <div x-data="editRole" class="flex flex-col justify-between w-full h-full px-10 py-5">
            <!--        table -->
            <div x-data="newRole" class="flex flex-col gap-3">
                <div class="flex flex-row justify-between w-full">
                    <div class="flex items-end"><span class="text-xs font-bold">لیست نقش ها</span></div>
                    <div>
                        <button x-on:click="showForm = true"
                                class="p-3 text-xs text-white transition-all duration-150 ease-in-out bg-blue-500 rounded-md shadow-md hover:scale-95">
                            نقش جدید  +
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-start">
                    <table class="w-1/2 overflow-hidden bg-white rounded-md shadow-md ">
                        <thead>
                        <tr>
                            <th class="w-8 p-2 border-2 border-t-0 border-b-0 border-l-0 border-r-0 border-gray-300">ردیف
                            </th>
                            <th class="p-2 border-2 border-t-0 border-b-0 border-l-0 border-gray-300">عنوان</th>
                            <th class="p-2 border-2 border-t-0 border-b-0 border-l-0 border-gray-300">فرآیند</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @php
                            $counter = 0;
                        @endphp
                        @foreach($roles as $role)
                            @php($counter++)
                            <tr>
                                <td class="p-2 border-2 border-b-0 border-l-0 border-r-0 border-gray-300">{{$counter}}</td>
                                <td class="p-2 border-2 border-b-0 border-l-0 border-gray-300">{{$role->title}}</td>
                                <td class="p-2 border-2 border-b-0 border-l-0 border-gray-300">
                                    <div class="flex flex-row items-center justify-center gap-2">
                                        <!-- edit -->
                                        <button onClick="edit_role('{{$role->id}}')" x-on:click="editForm = true" class="w-8 p-1 text-white rounded-sm bg-amber-500 flex-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
                                        </button>
                                        <!--                                delete -->
                                        <form action="{{route('admin.role.delete', $role)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="w-8 p-1 text-white bg-red-500 rounded-sm flex-center">
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
                </div>
                <!--        create new role -->
                <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-50 "
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-50 "
                     x-transition:leave-end="opacity-0 "
                     x-cloak class="fixed inset-0 bg-gray-900 opacity-50 flex-style">
                </div>
                <!--        request form -->
                <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100 "
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 "
                     x-transition:leave-end="opacity-0 "
                     x-cloak class="fixed inset-0 z-10 flex-center">
                    <div x-on:click.away="closeNew()"
                         class="relative flex flex-col w-1/2 gap-10 px-3 bg-gray-100 rounded-md">
                        <div class="w-full"><span class="text-xs font-bold">جدید</span></div>
                        <form id="new-role-form" action="{{route('admin.role.create')}}" method="post" class="flex flex-col w-full gap-1">
                            @csrf
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-row">
                                    <div class="flex flex-col w-full gap-2 p-2">
                                        <!--                                        full name-->
                                        <div class="flex flex-row gap-3">
                                            <label for="fullName" class="after:content-['*'] after:text-red-500">عنوان</label>
                                            <input type="text" name="title" id="fullName" class="w-2/3 h-8 px-2 border border-gray-300 rounded-md outline-0">
                                        </div>
                                        <!--                                        phone -->
                                        <div class="flex flex-col gap-3 mr-14">
                                            <div>
                                                <input type="checkbox" class="absolute top-0 invisible radio-checked:bg-purple-500 radio-checked:text-white" id="selectAllNew">
                                                <label for="selectAllNew" class="px-2 py-1 font-iransans text-xs text-purple-500 duration-150 border border-purple-500 rounded-md select-none transition-all">انتخاب همه</label>
                                            </div>
                                            <!-- checkboxes -->
                                            <div class="flex flex-wrap">
                                                @foreach($permissions as $permission)
                                                    <div class="m-1">
                                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" class="new absolute top-0 invisible radio-checked:bg-purple-500 radio-checked:text-white" id="{{$permission->slug}}">
                                                        <label for="{{$permission->slug}}" class="px-2 py-1 font-iransans text-xs text-purple-500 duration-150 border border-purple-500 rounded-md select-none transition-all">{{$permission->label}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="px-3 py-2 text-white transition-all duration-150 ease-in-out bg-green-500 rounded-md hover:scale-95">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--            close new request-->
                        <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeNew()" viewBox="0 0 20 20"
                             fill="currentColor"
                             class="absolute w-5 h-5 text-red-500 rounded-full shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                </div>
                <!--        end create request -->
                <!--        edit role -->
                <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-50 "
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-50 "
                     x-transition:leave-end="opacity-0 "
                     x-cloak class="fixed inset-0 bg-gray-900 opacity-50 flex-style">
                </div>
                <!--        request form -->
                <div x-show="editForm" x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100 "
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 "
                     x-transition:leave-end="opacity-0 "
                     x-cloak class="fixed inset-0 z-10 flex-center">
                    <div x-on:click.away="closeEdit()"
                         class="relative flex flex-col w-1/2 gap-10 px-3 bg-gray-100 rounded-md">
                        <div class="w-full"><span class="text-xs font-bold">جدید</span></div>
                        <form id="edit-role-form" action="{{route('admin.role.update', $role)}}" method="post" class="flex flex-col w-full gap-1">
                            @csrf
                            @method('PATCH')
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-row">
                                    <div class="flex flex-col w-full gap-2 p-2">
                                        <!--                                        title-->
                                        <div class="flex flex-row gap-3">
                                            <label for="fullNameEdit" class="after:content-['*'] after:text-red-500">عنوان</label>
                                            <input type="text" name="title" id="fullNameEdit" class="w-2/3 h-8 px-2 border border-gray-300 rounded-md outline-0">
                                        </div>
                                        <!--                                        permissions -->
                                        <div class="flex flex-col gap-3 mr-14">
                                            <div>
                                                <input type="checkbox" class="absolute top-0 invisible radio-checked:bg-purple-500 radio-checked:text-white" id="selectAllEdit">
                                                <label for="selectAllEdit" class="px-2 py-1 font-iransans text-xs text-purple-500 duration-150 border border-purple-500 rounded-md select-none transition-all">انتخاب همه</label>
                                            </div>
                                            <!-- checkboxes -->
                                            <div id="parent_roles" class="flex flex-wrap">
                                                @foreach($permissions as $permission)
                                                    <div class="m-1">
                                                        <input type="checkbox" name="permissionsEdit[]" value="{{$permission->id}}" class="edit absolute top-0 invisible radio-checked:bg-purple-500 radio-checked:text-white" id="{{$permission->slug}}_edit">
                                                        <label for="{{$permission->slug}}_edit" class="px-2 py-1 font-iransans text-xs text-purple-500 duration-150 border border-purple-500 rounded-md select-none transition-all">{{$permission->label}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="px-3 py-2 text-white transition-all duration-150 ease-in-out bg-green-500 rounded-md hover:scale-95">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--            close new request-->
                        <svg xmlns="http://www.w3.org/2000/svg" x-on:click="closeEdit()" viewBox="0 0 20 20"
                             fill="currentColor"
                             class="absolute w-5 h-5 text-red-500 rounded-full shadow-md shadow-gray-400 hover:cursor-pointer top-2 left-2">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>

                </div>
                <!--        end edit request -->
            </div>
            <!--        paginate -->
            <div class="flex flex-row justify-center h-12 gap-2">
                <div class="px-4 bg-gray-300 rounded-md h-7">قبلی</div>
                <div class="px-4 bg-gray-300 rounded-md h-7">1</div>
                <div class="px-4 bg-gray-300 rounded-md h-7">بعدی</div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        // new role
        function newRole() {
            return {
                showForm: false,
                closeNew(){
                    this.showForm = false
                    document.getElementById("new-role-form").reset();
                }
            }
        }
        // new role
        function editRole() {
            return {
                editForm: false,
                closeEdit(){
                    this.editForm = false
                    document.getElementById("edit-role-form").reset();
                }
            }
        }

        // select all checkbox in new
        $("#selectAllNew").click(function(){
            $(".new").prop('checked', $(this).prop('checked'));

        });
        $(".new").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAllNew").prop("checked", false);
            }
        });

        // select all checkbox in edit
        $("#selectAllEdit").click(function(){
            $(".edit").prop('checked', $(this).prop('checked'));

        });
        $(".edit").click(function() {
            if (!$(this).prop("checked")) {
                $("#selectAllEdit").prop("checked", false);
            }
        });

        // load role for edit
        function edit_role(id){
            let all_permission_id = `{{$permissions->pluck('id')}}`;
            let all_child = document.getElementById("parent_roles").children;
            let input_title = document.getElementById("fullNameEdit");
            let edit_form = document.getElementById("edit-role-form");
            $.ajax({
                type : 'get',
                url : '/show_permissions_of_role',
                data : {
                    _token : "{{csrf_token()}}",
                    role_id : id
                },
                success : function (data){
                    // set title
                    input_title.value = data.data['role_title']
                    // set permission
                    for(let i = 0; i < all_child.length; i++){
                        if(data.data['permissions'].map(String).includes(all_child[i].children[0].value)){
                            all_child[i].children[0].checked = true;
                        }
                    }

                    // edit action form
                    edit_form.action = 'http://127.0.0.1:8000/admin/role_gss_e_group/update/'+id
                },
                error : function (data){
                    console.log(data);
                },
            })
        }

    </script>

@endsection
