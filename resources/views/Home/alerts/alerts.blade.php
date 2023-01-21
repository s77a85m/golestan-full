
@if(session('error'))
    <div id="alert_error" class="absolute text-xs top-20 left-5 h-12 bg-red-400 rounded-md flex p-2 justify-center items-center text-white">
        {{session('error')}}</div>
@endif
@if(session('status'))
    <div id="alert_status" class="absolute text-xs top-20 left-5 h-12 bg-green-600 rounded-md flex p-2 justify-center items-center text-white">
        {{session('status')}}</div>
@endif
@if($errors->any())
    <div id="box_error" class="absolute bg-opacity-50 shadow-md shadow-gray-400  backdrop-blur-sm flex flex-col text-xs top-32 left-5 bg-red-600 rounded-md flex p-2 px-5 justify-center items-start gap-2 text-white">
        <div class="flex w-full justify-between">
            <span class="flex text-center items-center">خطا:</span>
            <svg onclick="close_error()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white rounded-full shadow-md cursor-pointer">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
            </svg>
        </div>
        <ul class="flex flex-col gap-2 list-disc">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
