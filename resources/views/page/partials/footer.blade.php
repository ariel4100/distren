<!-- Footer -->
<footer class="page-footer" style="background-color: #000000">
    <div class="container text-md-left py-2">
        <div class="row mt-3">
            <div class="col-sm-12 col-md-5 d-flex justify-content-start align-items-center">
                @php($logos = \App\Content::seccionTipo('logos','texto')->first())
                @php($data = json_decode($logos->text))
                <img src="{!! asset($data->image_3) !!}" alt="" class="img-fluid">
                <!--<div class="d-flex my-5">
                    <p style="font-size: 13px">SEGUINOS EN</p>
                    <a href="" class="tpn-blue mx-2"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="" class="tpn-blue"><i class="fab fa-youtube fa-lg"></i></a>
                </div>-->
            </div>
            <div class="col-sm-12 col-md-3">
                <h6 class="text-uppercase distren-color">MAPA DE SITIO</h6>
                <a href="" class="nav-link m-0 p-0">Home</a>
                <a href="" class="nav-link m-0 p-0">Empresa</a>
                <a href="" class="nav-link m-0 p-0">Productos</a>
                <a href="" class="nav-link m-0 p-0">Ofertas</a>
                <a href="" class="nav-link m-0 p-0">Carrito</a>
                <a href="" class="nav-link m-0 p-0">Contacto</a>
            </div>
            {{--@php($contacto = \App\Content::seccionTipo('contacto','texto')->first())--}}
            {{--@php($data = json_decode($contacto->text))--}}

            <div class="col-sm-12 col-md-4">
                <h6 class="text-uppercase distren-color">DISTREN ENVASES</h6>
                <ul class="list-group" style="font-size: 13px">
                    <li class="list-group-item border-0 d-flex align-items-center px-0" style="background-color: unset">
                        <i class="material-icons distren-color mr-3">location_on</i>

                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0" style="background-color: unset">
                        <i class="material-icons distren-color mr-3">phone_in_talk</i>
                        <div class="">
                            <a href="tel: "> </a>
                            <br>
                            <a href="tel: "> </a>
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0" style="background-color: unset">
                        <i class="material-icons distren-color mr-3">send</i>
                        <a href="mailto: "> </a>
                    </li>
                </ul>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class=" ">
        <div class="container py-1 d-flex justify-content-between" style="border-top: 1px solid #888888; ">
            <p>© 2019</p>
            <a class="text-lighten-4" href="#!">BY OSOLE</a>
        </div>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->