<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


    <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        input {
            margin-left: 20px;
            margin-bottom: 10px;

        }

        span {
            margin-left: 20px;
            color: red;
        }
    </style>


</head>

<body>

    <form action="/client/{{ $Client->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="FirstName" value="{{ old('FirstName', $Client->FirstName) }}"> @error('FirstName')
            <span> {{ $message }}</span>
        @enderror
        <br>
        <br>
        <input type="text" name="MiddleName" value="{{ old('MiddleName', $Client->MiddleName) }}"> @error('MiddleName')
            <span> {{ $message }}</span>
        @enderror
        <br>
        <br>
        <input type="text" name="LastName" value="{{ old('LastName', $Client->LastName) }}"> @error('LastName')
            <span> {{ $message }}</span>
        @enderror
        <br>
        <br>
        <select id="Sex" name="Sex" value="{{ old('Sex', $Client->Sex) }}"
            style="margin-left: 20px;
            margin-bottom: 10px;">
            <option value="">select sex</option>
            <option value="male" {{ old('Sex', $Client->Sex) == 'male' ? 'selected' : '' }}>male</option>
            <option value="female" {{ old('Sex', $Client->Sex) == 'female' ? 'selected' : '' }}>female</option>
        </select> @error('Sex')
            <span> {{ $message }}</span>
        @enderror
        <br>
        <br>
        <input type="text" name="Contact_Number" value="{{ old('Contact_Number', $Client->Contact_Number) }}">
        @error('Contact_Number')
            <span> {{ $message }}</span>
        @enderror
        <br>
        <br>
        <input type="text" name="Address" value="{{ old('Address', $Client->Address) }}"> @error('Address')
            <span> {{ $message }}</span>
        @enderror
        <br><br><br>
        <input type="submit" name="submit" value="SAVE!"><br>

    </form>


</body>

</html>
