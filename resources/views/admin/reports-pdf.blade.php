<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factura - pdf</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    .factura {
        table-layout: fixed;
    }

    .fact-info>div>h5 {
        font-weight: bold;
    }

    .factura>thead {
        border-top: solid 3px #000;
        border-bottom: 3px solid #000;
    }

    .factura>thead>tr>th:nth-child(2),
    .factura>tbody>tr>td:nth-child(2) {
        width: 300px;
    }

    .factura>thead>tr>th:nth-child(n+3) {
        text-align: right;
    }

    .factura>tbody>tr>td:nth-child(n+3) {
        text-align: right;
    }

    .factura>tfoot>tr>th,
    .factura>tfoot>tr>th:nth-child(n+3) {
        font-size: 24px;
        text-align: right;
    }

    .cond {
        border-top: solid 2px #000;
    }
</style>

<body>
    <div id="app">
        {{-- <div class="container-fluid">
            <div class="d-flex">
                <img class="img-thumbnail" src="image/logoMarely1.svg" alt="" 
                
                    class="d-inline-block align-text-top">
            </div>
        </div> --}}
        <table class="table">
            <tbody>
                <tr>
                    <th class="align-middle" scope="col" colspan="4">
                        <img height="120" src="image/logoMarely3.svg" alt="">
                        <p>Librería & Art. Escolares</p>
                    </th>
                    <th class="text-right">
                        <p>N° de Comprobante: <i>xxx-000{{ $sale->id }}</i></p>
                        <p>Fecha y Hora: <i>{{ $sale->created_at->format('d/m/Y h:i:s') }}</i></p>
                        <p>Direccion: <i>Bº Sereantes Calle Loreto Grupo XII mz i casa 12</i></p>
                        <p>Vendedor: <i class="text-capitalize">{{ $sale->user->name }}</i></p>
                    </th>
                </tr>
            </tbody>
        </table>
        <hr />
        <div class="table-responsive">
            <table class="table-borderless factura table">
                <caption>List of Article</caption>
                <thead class="align-middle">
                    <tr>
                        <th>Cant.</th>
                        <th>Articulo</th>
                        <th>Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->products as $item)
                        <tr>
                            <td>{{ $item->pivot->quantity }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>$ {{ $item->pivot->price_to_date }}</td>
                            <td>$ {{ number_format(($item->pivot->price_to_date * $item->pivot->quantity) , 2,',','') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="align-bottom">
                            <h5>Total ${{ $sale->amount }}</h5>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="cond row">
            <div class="col-12 mt-3">
                <h4>Este comprobante no sirve como factura</h4>
                <p>Gracias por elegirnos</p>
            </div>
        </div>

</body>

</html>
