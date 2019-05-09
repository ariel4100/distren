@extends('page.layouts.app')

@section('content')
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13143.607446757835!2d-58.4701564!3d-34.5560401!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7bfdcdb7e4fb77c0!2sDistren+-+Envases!5e0!3m2!1ses!2sar!4v1557415800721!5m2!1ses!2sar" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <h4 class="distren-color text-uppercase distren-bold ml-md-5">Contacto</h4>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="material-icons distren-color mr-3">location_on</i>
                        <a href="https://bit.ly/309sR9i" target="_blank" class="text-muted">121212121212</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="material-icons distren-color mr-3">phone_in_talk</i>
                        <a href="tel: " class="text-muted">121212121212</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="fab fa-whatsapp distren-color mr-3" style="padding: 2px; font-size: 24px"></i>
                        <a href="tel: " class="text-muted" target="_blank">dsd21212121212sd</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center">
                        <i class="material-icons distren-color mr-3">mail_outline</i>
                        <a href="mailto: " class="text-muted">ddddddddddddddddddddd</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <form class="form-row ">
                    <div class="md-form col-md-6">
                        <input type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="md-form col-md-6">
                        <input type="text" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="md-form col-md-6">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="md-form col-md-6">
                        <input type="text" class="form-control" placeholder="Telefono">
                    </div>
                    <div class="md-form col-md-12">
                        <textarea id="form7" class="md-textarea form-control" rows="3"></textarea>
                        <label for="form7">Mensaje</label>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div class="g-recaptcha" data-sitekey="6LfxBKAUAAAAALkxGpbMmbopqVeVZYR3Q64Hg-ts"></div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Acepto los términos y condiciones de privacidad</label>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn text-white my-4 distren-fondo">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
