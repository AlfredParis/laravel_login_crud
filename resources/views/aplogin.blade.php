@extends('PageFormat.aplayout')
@section('main')
    <div class="flex flex-wrap justify-center w-full">

        <div class="flex flex-col justify-center ">
            <div class="flex justify-center pt-12 md:justify-start md:pl-12 md:-mb-24 ">
                <a href="/client" class="p-4 text-xl font-bold text-white bg-black">Log In Form</a>
            </div> <br><br><br><br>
            <div class="flex flex-col justify-center px-8 pt-8 my-auto md:justify-start md:pt-0 md:px-24 lg:px-32 ">
                <form action="ap" method="GET" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <input type="text" name="ap_username" placeholder="User Name">
                        @error('ap_username')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        function myFunction() {
                            var x = document.getElementById("myInput");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <div class="flex flex-col pt-4">
                        <input type="password" name="ap_password" placeholder="Password" id="myInput">
                        @error('ap_password')
                            <span> {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div>
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>


                    <input type="submit" name="submit" value="LogIn"
                        class="p-2 mt-8 text-lg font-bold text-white bg-black hover:bg-gray-700">


                </form>
                <a href="ap/create">Register</a>
            </div>
            @isset($ap_username)
                {{ $ap_username }} <br> {{ $ap_password }}
            @endisset
        </div>

    </div>
@endsection
