<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


    @vite('resources/css/app.css')

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="w-full max-w-xs ">
        <form action="/ap/{{ $Users->id }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">User name</label>
                <input type="text" id="username" name="ap_username"
                    value="{{ old('ap_username', $Users->ap_username) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('ap_username')
                    <span> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">Full name</label>
                <input type="text" name="ap_fullname" value="{{ old('ap_fullname', $Users->ap_fullname) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="fullname">
                @error('ap_fullname')
                    <span> {{ $message }}</span>
                @enderror

            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input type="text" name="ap_password" value="{{ decrypt(old('ap_password', $Users->ap_password)) }} "
                    id="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('ap_password')
                    <span> {{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="accountType">Account Type</label>
                <select id="ap_accountType" name="ap_accountType"
                    value="{{ old('ap_accountType', $Users->ap_accountType) }}"
                    class="w-full bg-white border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    id="accountType">
                    <option value="">select Account Type</option>
                    <option value="user"
                        {{ old('ap_accountType', $Users->ap_accountType) == 'user' ? 'selected' : '' }}>
                        user
                    </option>
                    <option value="admin"
                        {{ old('ap_accountType', $Users->ap_accountType) == 'admin' ? 'selected' : '' }}>
                        admin</option>
                </select> @error('ap_accountType')
                    <span> {{ $message }}</span>
                @enderror
                <br><br><br>
                <input type="submit" name="submit" value="SAVE!"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><br>

        </form>

    </div>
</body>

</html>
