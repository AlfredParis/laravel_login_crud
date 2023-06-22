<!DOCTYPE html>
<html>

<head>
    <title>show</title>
    <style>
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
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

</head>

<body>

    <table id="customers">
        <thead>
            <tr>
                <td>ID</td>
                <td>FirstName</td>
                <td>MiddleName</td>
                <td>LastName</td>
                <td>Sex</td>
                <td>Contact_Number</td>
                <td>Address</td>
                <td>Created at</td>
                <td>Updated at</td>
            </tr>
        </thead>
        <tr>
            <td>{{ $Client->id }}</td>
            <td>{{ $Client->FirstName }}</td>
            <td>{{ $Client->MiddleName }}</td>
            <td>{{ $Client->LastName }}</td>
            <td>{{ $Client->Sex }}</td>
            <td>{{ $Client->Contact_Number }}</td>
            <td>{{ $Client->Address }}</td>
            <td>{{ $Client->created_at }}</td>
            <td>{{ $Client->updated_at }}</td>
        </tr>
    </table>
</body>

</html>
