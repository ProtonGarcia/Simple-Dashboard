<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.structure.min.css" integrity="sha512-oM24YOsgj1yCDHwW895ZtK7zoDQgscnwkCLXcPUNsTRwoW1T1nDIuwkZq/O6oLYjpuz4DfEDr02Pguu68r4/3w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css" integrity="sha512-9h7XRlUeUwcHUf9bNiWSTO9ovOWFELxTlViP801e5BbwNJ5ir9ua6L20tEroWZdm+HFBAWBLx2qH4l4QHHlRyg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="{{ asset('js/logic.js') }}"></script>

    <title>Parque vehicular</title>
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">

                    <strong>Parque vehicular</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    <main role="main">
        <section class="jumbotrone text-center">
            <div class="container">
                <h2 class="jumbotron-heading mt-5">Parque vehicular de El Salvador</h2>
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1" id="l1">Vehiculos por marca</a></li>
                        <li><a href="#tabs-2" id="l2">Vehiculos por Departamento</a></li>
                        <li><a href="#tabs-3" id="l3">Tipo de combustible</a></li>
                        <li><a href="#tabs-4" id="l4">Modelos más comunes</a></li>
                        <li><a href="#tabs-5" id="l5">Sobre Nosotros</a></li>
                    </ul>
                    <div id="tabs-1">
                        <h4 class="jumbotron-heading mt-5">Top marcas en El Salvador</h4>
                        <button id="btnPdf" class=" btn btn-success"><a href="{{ route('marcas.pdf') }}">Exportar pdf</a></button>
                    </div>
                    <div id="tabs-2">
                        <h4 class="jumbotron-heading mt-5">Vehiculos por Departamento en El Salvador</h4>
                        <button id="btnPdf" class=" btn btn-success"><a href="{{ route('departamentos.pdf') }}">Exportar pdf</a></button>
                    </div>
                    <div id="tabs-3">
                        <h4 class="jumbotron-heading mt-5">Tipo de combustible mas usado en El Salvador</h4>

                    </div>
                    <div id="tabs-4">
                        <h4 class="jumbotron-heading mt-5">Modelos de vehiculos más comunes en El Salvador</h4>
                        <button id="btnPdf" class=" btn btn-success"><a href="{{ route('modelos.pdf') }}">Exportar pdf</a></button>
                    </div>
                    <div id="tabs-5">
                        <h4 class="jumbotron-heading mt-5">Universidad Tecnologica de El Salvador</h4>
                        <p>Calderon Guadron, Douglas Andres 25-2865-2016</p>
                        <p>Cordova Guevara, Dennys Francisco 25-3391-2016</p>
                        <p>Garcia Urrutia, Jonathan Alexander 25-3438-2016</p>
                        <p>Pascasio Calderon, Jose Daniel 25-1670-2016</p>
                        <p>Valle Ortiz, Douglas Isaias 25-1612-2016</p>
                    </div>

                </div>

                <div class="row justify-content-center">
                    <div id="graficas" class="">

                    </div>
                </div>



                <table id="tableDetails" class="table mt-5 invisible">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>

                        </tr>
                    </thead>

                </table>
            </div>


        </section>
    </main>



    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 UTEC
         
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>

</html>