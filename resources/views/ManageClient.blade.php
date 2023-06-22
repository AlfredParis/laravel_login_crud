<!DOCTYPE html>
<html>

<head>
    <title>ManageClient</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    @vite('resources/css/app.css')
</head>

<style>
    a {
        background-color: #242234;
        color: #ffffff;
        border-color: #242234;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
        margin: .5rem;
    }

    .a {
        background-color: #242234;
        color: #ffffff;
        border-color: #242234;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: .5rem;
        border-radius: 5px;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers thead {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers thead {
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: left;
        background-color: #242234;
        color: white;
    }
</style>

<body>


    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script>
    {{-- @if (Session('message'))
        <div class="alert alert-success">
            <strong>{{ Session('message') }}</strong>
        </div>
    @endif --}}
    <h1 style="font-size:3rem"> Loginned acount: {{ $qwe }} </h1>
    <a href="/client/create">Add a Client</a> <a href="forget">logout</a><a href="/ap/create">Add user</a> <br>

    <h1 style="font-size:3rem ">This is Client Table</h1>
    <div class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">

        <table class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <thead>
                <tr>
                    <td scope="col" class="px-6 py-3">ID</td>
                    <td scope="col" class="px-6 py-3">FirstName</td>
                    <td scope="col" class="px-6 py-3">MiddleName</td>
                    <td scope="col" class="px-6 py-3">LastName</td>
                    <td scope="col" class="px-6 py-3">Sex</td>
                    <td scope="col" class="px-6 py-3">Contact_Number</td>
                    <td scope="col" class="px-6 py-3">Address</td>
                    <td scope="col" class="px-6 py-3"> Views </td>
                    <td scope="col" class="px-6 py-3"> Edit </td>
                    <td scope="col" class="px-6 py-3"> Delete </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $list)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{ $list->id }}</td>
                        <td class="px-6 py-4">{{ $list->FirstName }}</td>
                        <td class="px-6 py-4">{{ $list->MiddleName }}</td>
                        <td class="px-6 py-4">{{ $list->LastName }}</td>
                        <td class="px-6 py-4">{{ $list->Sex }}</td>
                        <td class="px-6 py-4">{{ $list->Contact_Number }}</td>
                        <td class="px-6 py-4">{{ $list->Address }}</td>
                        <td class="px-6 py-4"><a href="/client/{{ $list->id }}">view</a></td>
                        <td class="px-6 py-4"><a href="/client/{{ $list->id }}/edit">edit</a></td>
                        <td class="px-6 py-4">
                            <form action="/client/{{ $list->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="sumbit" value="Delete" class="a">
                            </form>
                        </td class="px-6 py-4">
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $lists->links() }}
    <br>

    <h1 style="font-size:3rem ">This is User Table</h1>
    <div class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <table class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <thead>
                <tr>
                    <td scope="col" class="px-6 py-3">ID</td>
                    <td scope="col" class="px-6 py-3">username</td>
                    <td scope="col" class="px-6 py-3">Full Name</td>
                    <td scope="col" class="px-6 py-3">password</td>
                    <td scope="col" class="px-6 py-3">Account type</td>

                    <td scope="col" class="px-6 py-3"> Edit </td>
                    <td scope="col" class="px-6 py-3"> Delete </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($userAcc as $list)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                            {{ $list->id }}</td>
                        <td class="px-6 py-4">{{ $list->ap_username }}</td>
                        <td class="px-6 py-4">{{ $list->ap_fullname }}</td>
                        <td class="px-6 py-4">{{ decrypt($list->ap_password) }}</td>
                        <td class="px-6 py-4">{{ $list->ap_accountType }}</td>
                        <td class="px-6 py-4"><a href="/ap/{{ $list->id }}/edit">edit</a></td>
                        <td class="px-6 py-4">
                            <form action="/ap/{{ $list->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="sumbit" value="Delete" class="a">
                            </form>
                        </td class="px-6 py-4">
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $userAcc->links() }}



</body>

</html>
