@extends('adm.layouts.app')

@section('content')
    <div class="container my-5">
        <form class="row" method="POST" action="{{ route('contenido.update', $contenido ) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="section" value="{{$section}}">
            <input type="hidden" name="type" value="{{$type}}">
            @if($section == 'home')
                <div class="col-md-12">
                    <div class="md-form">
                        <h6>Texto</h6>
                        <textarea id="text" class="md-textarea form-control" name="text" rows="3">{!! isset($contenido) ? $contenido->text : null !!}</textarea>
                    </div>
                </div>
                <!--<div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                    </div>
                </div>
                <div class="col-md-12 my-5 text-center">
                    <img src="{{ $contenido->image }}" alt="" class="img-fluid">
                </div>-->
            @endif
            @if($section == 'dss')
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="title" class="form-control" value="{!! isset($contenido) ? $contenido->title : null !!}">
                        <label for="Titulo">Titulo</label>
                    </div>
                    <div class="md-form">
                        <h6>Texto</h6>
                        <textarea id="text" class="md-textarea form-control" rows="3">{!! isset($contenido) ? $contenido->text : null !!}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="mb-0 ml-2" for="material-url" >Video URL</label>
                    <div class="md-form input-group mt-0 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text md-addon" id="material-addon3">https://www.youtube.com/watch?v=</span>
                        </div>
                        <input type="text" class="form-control" name="video" id="material-url" aria-describedby="material-addon3" value="{!! isset($contenido) ? $contenido->video : null !!}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
                    </div>
                </div>
                <div class="col-md-12 my-5 text-center">
                    <img src="{{ $contenido->image }}" alt="" class="img-fluid" style="height: 200px">
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="Subtitulo" name="subtitle" class="form-control" value="{!! isset($contenido) ? $contenido->subtitle : null !!}">
                        <label for="Subtitulo">Subtitulo</label>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="destacado" {!! $contenido->destacado ? 'checked' : null !!}>
                        <label class="custom-control-label" for="defaultUnchecked">Home?</label>
                    </div>
                </div>
            @endif
            @if($section == 'empresa')
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="title" placeholder="Titulo" class="form-control" value="{!! isset($data['title']) ? $data['title'] : null !!}">
                    </div>
                    <div class="md-form">
                        <textarea id="text" class="md-textarea form-control" name="text" rows="3">{!! isset($data['text']) ? $data['text'] : null !!}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Valores" name="valores" placeholder="Valores: Titulo" class="form-control" value="{!! isset($data['valores']) ? $data['valores'] : null !!}">
                    </div>
                    <div class="md-form">
                        <textarea id="text_valores" class="md-textarea form-control" name="text_valores" rows="3">{!! isset($data['text_valores']) ? $data['text_valores'] : null !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="mision" name="mision" placeholder="Misión: Titulo" class="form-control" value="{!! isset($data['mision']) ? $data['mision'] : null !!}">
                    </div>
                    <div class="md-form">
                        <textarea id="text_mision" class="md-textarea form-control" name="text_mision" rows="3">{!! isset($data['text_mision']) ? $data['text_mision'] : null !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="vision" name="vision" placeholder="Visión: Titulo" class="form-control" value="{!! isset($data['vision']) ? $data['vision'] : null !!}">
                    </div>
                    <div class="md-form">
                        <textarea id="text_vision" class="md-textarea form-control" name="text_vision" rows="3">{!! isset($data['text_vision']) ? $data['text_vision'] : null !!}</textarea>
                    </div>
                </div>
            @endif
            @if($section == 'logos')
                <div class="col-md-12 text-center">
                    <div class="col-md-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="Favicon" name="image" lang="es">
                            <label class="custom-file-label" for="Favicon">Seleccionar Logo Favicon</label>
                        </div>
                        <img src="{!! isset($logos['image']) ? asset($logos['image']) : null !!}" alt="" class="img-fluid my-4">
                    </div>
                    <div class="col-md-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="Header" name="image_2" lang="es">
                            <label class="custom-file-label" for="Header">Seleccionar Logo Header</label>
                        </div>
                        <img src="{!! isset($logos['image_2']) ? asset($logos['image_2']) : null !!}" alt="" class="img-fluid my-4">
                    </div>
                    <div class="col-md-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="Footer" name="image_3" lang="es">
                            <label class="custom-file-label" for="Footer">Seleccionar Logo Footer</label>
                        </div>
                        <img src="{!! isset($logos['image_3']) ? asset($logos['image_3']) : null !!}" alt="" class="img-fluid my-4">
                    </div>
                </div>
            @endif
            @if($section == 'contacto')
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="title" placeholder="Titulo" class="form-control" value="{!! isset($datos['title']) ? $datos['title'] : null !!}">
                    </div>
                    <div class="md-form">
                        <input type="text" id="Dirección" name="direccion" placeholder="Dirección" class="form-control" value="{!! isset($datos['direccion']) ? $datos['direccion'] : null !!}">
                    </div>
                    <div class="row">
                        <div class="md-form col-md-6">
                            <input type="text" id="Telefono_1" name="telefono_1" placeholder="Telefono 1" class="form-control" value="{!!  isset($datos['telefono_1']) ? $datos['telefono_1'] : null !!}">
                        </div>
                        <div class="md-form col-md-6">
                            <input type="text" id="Telefono_2" name="telefono_2" placeholder="Telefono 2" class="form-control" value="{!!  isset($datos['telefono_2']) ? $datos['telefono_2'] : null !!}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="md-form col-md-6">
                            <input type="text" id="Correo" name="correo" placeholder="Correo 1" class="form-control" value="{!!  isset($datos['correo']) ? $datos['correo'] : null !!}">
                        </div>
                        <div class="md-form col-md-6">
                            <input type="text" id="Correo_2" name="correo_2" placeholder="Correo 2" class="form-control" value="{!!  isset($datos['correo_2']) ? $datos['correo_2'] : null !!}">
                        </div>
                    </div>
                </div>
            @endif
            @if($section == 'redes')
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="facebook" placeholder="URL Facebook" class="form-control" value="{!! isset($data['facebook']) ? $data['facebook'] : null !!}">
                    </div>
                    <div class="md-form">
                        <input type="text" id="Titulo" name="youtube" placeholder="URL Youtube" class="form-control" value="{!! isset($data['youtube']) ? $data['youtube'] : null !!}">
                    </div>
                </div>
            @endif
            @if($section == 'condiciones')
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="title" placeholder="Titulo" class="form-control" value="{!! isset($condiciones['title']) ? $condiciones['title'] : null !!}">
                    </div>
                    <div class="md-form">
                        <textarea id="text" class="md-textarea form-control" name="text" rows="3">{!! isset($condiciones['text']) ? $condiciones['text'] : null !!}</textarea>
                    </div>
                </div>
            @endif
            @if($section == 'carrito')
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="envio" name="envio" placeholder="Forma de Envio" class="form-control" value="{!! isset($carrito['envio']) ? $carrito['envio'] : null !!}">
                    </div>
                    <div class="md-form">
                        <h6>Retiro en el local</h6>
                        <textarea id="local" class="md-textarea form-control" name="local" rows="3">{!! isset($carrito['local']) ? $carrito['local'] : null !!}</textarea>
                    </div>
                    <div class="md-form">
                        <h6>Expreso</h6>
                        <textarea id="expreso" class="md-textarea form-control" name="expreso" rows="3">{!! isset($carrito['expreso']) ? $carrito['expreso'] : null !!}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="pago" name="pago" placeholder="Forma de Pago" class="form-control" value="{!! isset($carrito['pago']) ? $carrito['pago'] : null !!}">
                    </div>
                    <div class="md-form">
                        <h6>Transferencia Bancaria</h6>
                        <textarea id="banco" class="md-textarea form-control" name="banco" rows="3">{!! isset($carrito['banco']) ? $carrito['banco'] : null !!}</textarea>
                    </div>
                    <div class="md-form">
                        <h6>Efectivo</h6>
                        <textarea id="efectivo" class="md-textarea form-control" name="efectivo" rows="3">{!! isset($carrito['efectivo']) ? $carrito['efectivo'] : null !!}</textarea>
                    </div>
                </div>
            @endif
            <div class="col-md-12 my-4 text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('banco');
        CKEDITOR.replace('efectivo');
        CKEDITOR.replace('local');
        CKEDITOR.replace('expreso');


        CKEDITOR.replace('text');
        CKEDITOR.replace('text_valores');
        CKEDITOR.replace('text_mision');
        CKEDITOR.replace('text_vision');
        CKEDITOR.config.width = '100%';
    </script>
@stop
