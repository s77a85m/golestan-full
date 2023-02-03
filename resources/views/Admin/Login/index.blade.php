<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="{{asset('assets/js/alpine.js')}}"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-200">
    <div class="h-screen w-full flex justify-center items-center">
        @include('Admin.alerts.alerts')
        <div class="flex flex-col rounded-sm overflow-hidden w-80">
            <div class="bg-blue-500 px w-full p-6 flex justify-center">
                <span class="text-white">AdminPanel</span>
            </div>
            <form action="{{route('admin.login')}}" method="post" class="w-full p-6 flex flex-col gap-2 bg-white">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="username">username</label>
                    <input type="text" id="username" name="username" autocomplete="off" class="focus:outline-none focus:ring-0 border border-gray-300 rounded-md h-10 px-2" placeholder="username">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" class="focus:outline-none focus:ring-0 border border-gray-300 rounded-md h-10 px-2" placeholder="username">
                </div>
                <div class="flex flex-col gap-2">
                    <input type="submit" value="Login" class="p-2 rounded-sm bg-green-500 text-white cursor-pointer">
                </div>
            </form>
        </div>
    </div>
    <script>
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
    </script>
</body>
</html>
