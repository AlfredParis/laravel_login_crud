@extends('PageFormat.aplayout')
@section('main')
    <div class="flex flex-wrap justify-center w-full">

        <div class="flex flex-col justify-center ">
            <div class="flex justify-center pt-12 md:justify-start md:pl-12 md:-mb-24 ">
                <a href="/client" class="p-4 text-xl font-bold text-white bg-black">Register User Form</a>
            </div> <br><br><br><br>
            <div class="flex flex-col justify-center px-8 pt-8 my-auto md:justify-start md:pt-0 md:px-24 lg:px-32 ">
                <form action="/ap" method="POST" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <input type="text" name="ap_username" placeholder="User Name" value="{{ old('ap_username') }}">
                        @error('ap_username')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col pt-4">
                        <input type="text" name="ap_fullname" placeholder="Full Name" value="{{ old('ap_fullname') }}">
                        @error('ap_fullname')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <input type="text" name="ap_password" placeholder="Password" value="{{ old('ap_password') }}">
                        @error('ap_password')
                            <span> {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="flex flex-col pt-4">
                        <select id="ap_accountType" name="ap_accountType">
                            <option value="">Select Account Type</option>
                            <option value="user" {{ old('ap_accountType') == 'user' ? 'selected' : '' }}>user</option>
                            <option value="admin" {{ old('ap_accountType') == 'admin' ? 'selected' : '' }}>admin</option>
                        </select>
                        @error('ap_accountType')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <input type="submit" name="submit" value="SAVE!"
                        class="p-2 mt-8 text-lg font-bold text-white bg-black hover:bg-gray-700">


                </form>


                @if ($ap_query == '')
                    <a href="/">Log In</a>
                @endif

            </div>
        </div>

    </div>
@endsection
