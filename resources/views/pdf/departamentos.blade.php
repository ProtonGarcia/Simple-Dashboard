<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h2 class="text-center mt-5">Reporte: total vehiculos por departamento</h2>
        <table class="table mt-5 text-center">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deptos as $marca)
                <tr>
                    <td>{{ $marca->datox }}</td>
                    <td>{{ $marca->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p id="datetime">Fecha:<?= date('Y-m-d'); ?></p>
        
</body>
</html>