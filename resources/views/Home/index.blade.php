<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="{{asset('assets/js/alpine.js')}}"></script>
    <title>{{config('app.name')}}</title>
</head>

<body dir="rtl" class="bg-gray-200">
<!-- navbar start-->
<nav class="w-full h-16 px-10 bg-stone-300">
    <section class="container flex flex-row-reverse items-center justify-between h-full">
        <!-- login button -->
        <div x-data="registerMenu">
            <button x-on:click="openmenu()" class="px-10 py-2 rounded-full shadow-md active:scale-90 bg-cyan-300 shadow-gray-400">
                <span class="font-iransans font-medium text-sm  ">ورود به سیستم</span>
            </button>
            <!-- signIn & singUp  -->
            <div x-show="openMenu"x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-0 "
                 x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-0"
                 x-transition:leave-end="opacity-0" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-900 opacity-0">
            </div>
            <!-- retister page -->
            <div x-show="openMenu"x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-100 "
                 x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0" x-cloak class="fixed inset-0 z-10 flex items-center justify-center">
                <div x-on:click.away="closmenu()" class="relative border-2 border-gray-300 flex flex-col gap-3 p-3 bg-white rounded-md">
                    <!-- select type -->
                    <div class="flex justify-center gap-20">
                        <span x-on:click="loginForm()" x-cloak x-bind:class="{'bg-gray-300 rounded-md' : formType=='login'}" class="p-2 cursor-pointer font-iransans font-medium text-style">ورود به سیستم</span>
                        <span x-on:click="registerForm()" x-cloak x-bind:class="{'bg-gray-300 rounded-md' : formType=='register'}" class="p-2 cursor-pointer font-iransans font-medium text-style">ثبت نام دانشجو</span>
                    </div>
                    <!-- loginForm -->
                    <form x-show="formType=='login'" x-cloak id="loginForm" accept="#" class="w-[570px] flex  mt-10 gap-10 flex-col">
                        <div class="flex flex-row gap-2">
                            <!-- inputs -->
                            <div class="flex flex-col gap-2 flex-none w-[380px]">
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="uid" class="flex items-center font-iransans font-medium text-style">نام کاربری:</label>
                                    <input autocomplete="off" type="text" id="uid" dir="ltr" name="uid" class="w-3/4 px-3 bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="pass" class="flex items-center font-iransans font-medium text-style">رمز عبور:</label>
                                    <input autocomplete="off" type="text" id="pass" dir="ltr" name="password" class="w-3/4 px-3 text-left bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <div class="flex justify-start pr-[53px] gap-1 flex-row">
                                    <label for="capcha" class="flex items-center font-iransans font-medium text-style">کد کپچا:</label>
                                    <input autocomplete="off" type="text" id="capcha" dir="ltr" name="capcha" class="w-1/3 px-3 text-left bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                            </div>
                            <!-- capcha -->
                            <div class="flex-1 px-3">
                                <div class="w-full h-full bg-red-200 rounded-md flex-center">1234</div>
                            </div>
                        </div>
                        <!-- submit -->
                        <div class="w-full flex-center">
                            <button class="px-10 py-2 text-white bg-green-600 rounded-sm font-iransans font-medium shadow-md shadow-gray-500 text-style">ورود</button>
                        </div>
                    </form>
                    <!-- registerForm -->
                    <form x-show="formType=='register'" x-cloak id="registerForm" action="#" enctype="multipart/form-data" class="w-[800px] flex mt-10 gap-10 flex-col">
                        <div class="flex flex-row w-full gap-2">
                            <!-- part1 -->
                            <div class="flex flex-col flex-1 gap-2">
                                <!-- name -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="name" class="after:content-['*'] after:text-red-500 font-iransans font-medium text-style flex items-center">نام</label>
                                    <input autocomplete="off" type="text" id="name"  name="name" class="w-3/4 px-3 bg-gray-200 rounded-md font-iransans font-medium text-style h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <!-- lastname -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="lastname" class="after:content-['*'] after:text-red-500 text-style font-iransans font-medium flex items-center">نام خانوادگی</label>
                                    <input autocomplete="off" type="text" id="lastname"  name="lastname" class="w-3/4 px-3 bg-gray-200 rounded-md font-iransans font-medium text-style h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <!-- meliCode -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="melicode" class="after:content-['*'] after:text-red-500 text-style font-iransans font-medium flex items-center">شماره ملی</label>
                                    <input autocomplete="off" type="text" id="melicode" dir="ltr" name="melicode" class="w-3/4 px-3 bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <!-- phone -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="phone" class="after:content-['*'] after:text-red-500 text-style font-iransans font-medium flex items-center">موبایل</label>
                                    <input autocomplete="off" type="text" id="phone" dir="ltr" name="phone" class="w-3/4 px-3 bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <!-- email -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="email" class="after:content-['*'] after:text-red-500 text-style font-iransans font-medium flex items-center">ایمیل</label>
                                    <input autocomplete="off" type="text" id="email" dir="ltr" name="email" class="w-3/4 px-3 bg-gray-200 rounded-md h-9 focus:ring-0 focus:outline-none">
                                </div>
                                <!-- degri -->
                                <div class="flex flex-row justify-end gap-1">
                                    <label for="degri" class="after:content-['*'] after:text-red-500 text-style font-iransans font-medium flex items-center">مقطع تحصیلی</label>
                                    <select name="degri" id="degri" class="w-3/4 px-2 bg-gray-100 rounded-md text-style h-9 font-iransans font-medium focus:ring-0 focus:outline-none">
                                        <option selected disabled>مقطع تحصیلی </option>
                                        <option value="1">کارشناسی ارشد</option>
                                        <option value="2">کارشناسی ناپیوسته</option>
                                    </select>
                                </div>
                            </div>
                            <!-- part2 -->
                            <div class="flex-col flex-1">
                                <!-- upload image -->
                                <div class="flex-col flex-center">
                                    <label class="hover:cursor-pointer" for="image-input">
                                        <div id="uploaded-image" class="flex-center "><img id="file-ip-1-preview" src="{{asset('assets/images/statics/user.jpg')}}" class="" alt="user"></div>
                                    </label>
                                    <input onchange="showPreview(event);" accept="image/jpeg, image/png, image/jpg" id="image-input" type="file" name="image" class="invisible">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <!-- field -->
                                    <div class="flex flex-row justify-end gap-1">
                                        <label for="field" class="after:content-['*'] after:text-red-500 text-style flex font-iransans font-medium items-center">رشته تحصیلی</label>
                                        <select name="field" id="field" class="w-3/4 px-2 bg-gray-100 rounded-md text-style font-iransans font-medium h-9 focus:ring-0 focus:outline-none">
                                            <option selected disabled>رشته تحصیلی</option>
                                            <option value="1">مهندسی برق</option>
                                            <option value="2">مهندسی کامپیوتر</option>
                                            <option value="2">مهندسی صنایع</option>
                                            <option value="2">مهندسی مکانیک</option>
                                        </select>
                                    </div>
                                    <!-- degri -->
                                    <div class="flex flex-row justify-end gap-1">
                                        <label for="trend" class="after:content-['*'] after:text-red-500 text-style flex font-iransans font-medium items-center">گرایش</label>
                                        <select name="trend" id="trend" class="w-3/4 px-2 bg-gray-100 rounded-md text-style font-iransans font-medium h-9 focus:ring-0 focus:outline-none">
                                            <option selected disabled>مقطع تحصیلی </option>
                                            <option value="1">کارشناسی ارشد</option>
                                            <option value="2">کارشناسی ناپیوسته</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- submit -->
                        <div class="w-full flex-center">
                            <button class="px-10 py-2 text-white bg-green-600 rounded-sm shadow-md font-iransans font-medium shadow-gray-500 text-style">ثبت نام</button>
                        </div>
                    </form>
                    <!-- close register -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" x-on:click="closmenu()" class="absolute w-6 h-6 text-red-500 rounded-full shadow-md cursor-pointer top-2 left-2">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                    </svg>
                    <ul x-show="formType=='login'" class="absolute flex flex-col gap-3 list-disc -bottom-20 right-5">
                        <li class="text-style font-iransans font-medium">نام کاربری شماره دانشجویی و رمز عبور شماره ملی می باشد.</li>
                        <li class="text-style font-iransans font-medium">از کیبورد انگلیسی استفاده کنید.</li>
                    </ul>
                    <ul x-show="formType=='register'" class="absolute flex flex-col gap-3 list-disc -bottom-10 right-5">
                        <li class="text-style font-iransans font-medium">موارد دارای * نباید خالی باشند.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- start logo and title-->
        <div class="flex items-center h-full gap-2">
            <a href="£">
                <img src="{{asset('assets/images/statics/iut-logo-690.png')}}" class="rounded-full h-11 w-11" alt="">
            </a>
            <div class="flex items-center h-full">
                <span class="font-iransans font-medium text-sm  font-iransans font-medium">شبیه سازی سیستم گلستان دانشگاه صنعتی اصفهان</span>
            </div>
        </div>
        <!-- end logo -->
    </section>
</nav>
<!-- end navbar -->
<!-- start main -->
<main class="w-full p-16">
    <!-- Announcements -->
    <div class="flex flex-col gap-5">
        <h1 class="font-iransans font-medium text-lg ">اخبار و اطلاعیه ها</h1>
        <ul class="flex font-iransans font-medium flex-col gap-5 px-4  list-disc text-style">
            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</li>
            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و بسادگی نامفهوم از صنعت چاپ اسادگی
                نامفهوم از صنعت ی نامفهوم از صنعت چاپ استفاده از طراحان گرافیک است</li>
            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ سادگی نامفهوم از صنعت چاپ سادگی نامفهوم از
                صنعت چاپ و با استفاده از طراحان گرافیک است</li>
            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ سادگی نامفهوم از صنعت چسادگی نامفهوم از
                صنعت چااپ سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</li>
        </ul>
    </div>
</main>
<!-- end main -->

<!-- scripts -->
<script>
    // handle type of signIN and singUp
    function registerMenu() {
        return {
            openMenu: false,
            formType: "login",
            openmenu(){
                this.openMenu = true;
                this.formType = "login"
            },
            closmenu(){
                this.openMenu = false;
                document.getElementById("loginForm").reset();
                document.getElementById("registerForm").reset();
                document.getElementById("file-ip-1-preview").src = "{{asset('assets/images/statics/user.jpg')}}";
            },
            loginForm(){
                this.formType = "login"
            },
            registerForm(){
                this.formType = "register"
            },

        }
    }

    // handle upload image student
    function showPreview(event){
        if(event.target.files.length > 0){
            let src = URL.createObjectURL(event.target.files[0]);
            let perview = document.getElementById("file-ip-1-preview");
            perview.src = src;
        }
    }
</script>
</body>

</html>
