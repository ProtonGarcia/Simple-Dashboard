<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        *{
            margin: 0 auto;
            text-align: center;
        }

        tbody{
            text-align: justify !important;
        }
    </style>
</head>
<body>
    <h2 class="text-center mt-5">Reporte: Modelos de vehiculos populares en El Salvador</h2><br><br>
        <table class="table mt-5 text-center">
            <thead>
                <tr>
                    <th>Modelos</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelos as $marca)
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