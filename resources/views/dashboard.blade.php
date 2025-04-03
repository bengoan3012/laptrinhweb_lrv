<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: blue;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination a {
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid gray;
            margin: 0 5px;
            color: black;
        }
        .pagination a:hover {
            background: lightgray;
        }
    </style>
</head>
<body>
@yield('content')  
</body>
</html>