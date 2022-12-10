<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Generar Tickets</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route("qrinvitacion")}}" method="get">
                        <div class="row">
                            <h5>Ingrese el rango de tickets a generar</h5>
                            <div class="col-md-6 mb-3">
                                <input type="number" name="desde" id="" class="form-control" placeholder="desde" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" name="hasta" id="" class="form-control" placeholder="hasta" required>
                            </div>
                            <center>
                                <button class="btn btn-success">Generar</button>
                            </center>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('RemoteStack') !!}
            </div>
        </div> --}}
    </div>
</body>
</html>
