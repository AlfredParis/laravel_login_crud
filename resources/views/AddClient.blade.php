<!DOCTYPE html>
<html>

<head>
    <title>AddClient</title>

    @vite('resources/css/app.css')
    {{-- <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style> --}}

</head>

<body class="bg-white font-family-karla h-screen justify-center">
    <div class="w-full flex flex-wrap w-full justify-center">

        <div class=" justify-center  flex flex-col">
            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24 ">
                <a href="/client" class="bg-black text-white font-bold text-xl p-4">Add Client Form</a>
            </div> <br><br><br><br>
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32 ">
                <form action="/client" method="POST" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <input type="text" name="FirstName" placeholder="FirstName" value="{{ old('FirstName') }}">
                        @error('FirstName')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <input type="text" name="MiddleName" placeholder="MiddleName"
                            value="{{ old('MiddleName') }}">
                        @error('MiddleName')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <input type="text" name="LastName" placeholder="LastName" value="{{ old('LastName') }}">
                        @error('LastName')
                            <span> {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="flex flex-col pt-4">
                        <select id="Sex" name="Sex">
                            <option value="">Select Sex</option>
                            <option value="male" {{ old('Sex') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('Sex') == 'female' ? 'selected' : '' }}>Female</option>
                        </select> @error('Sex')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        {{-- <input type="text" name="Sex" placeholder="Sex"><br><br> --}}
                        <input type="number" name="Contact_Number" placeholder="Contact_Number"
                            value="{{ old('Contact_Number') }}">
                        @error('Contact_Number')
                            <span> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col pt-4">
                        <input type="text" name="Address" placeholder="Address" value="{{ old('Address') }}">
                        @error('Address')
                            <span> {{ $message }}</span>
                        @enderror

                    </div>
                    <input type="submit" name="submit" value="SAVE!"
                        class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">


                </form>
            </div>
        </div>

    </div>
</body>

</html>
