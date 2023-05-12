<!DOCTYPE html>
<html>
<head>
    <title>Data Ikan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        td {
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Data Ikan</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Pelabuhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ikanList as $ikan)
                <tr>
                    <td>{{ $ikan->nama }}</td>
                    <td>{{ $ikan->harga }}</td>
                    <td>{{ $ikan->pelabuhan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
