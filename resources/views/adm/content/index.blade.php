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
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="Titulo" name="title" class="form-control" value="{!! isset($data) ? $data['title'] : null !!}">
                        <label for="Titulo">Titulo</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Dirección" name="direccion" class="form-control" value="{!! isset($data) ? $data['direccion'] : null !!}">
                        <label for="Dirección">Dirección</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Telefono_1" name="telefono_1" class="form-control" value="{!!  isset($data) ? $data['telefono_1'] : null !!}">
                        <label for="Telefono_1">Telefono 1</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Telefono_2" name="telefono_2" class="form-control" value="{!!  isset($data) ? $data['telefono_2'] : null !!}">
                        <label for="Telefono_2">Telefono 2</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Correo" name="correo" class="form-control" value="{!!  isset($data) ? $data['correo'] : null !!}">
                        <label for="Correo">Correo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form">
                        <input type="text" id="title_2" name="title_2" class="form-control" value="{!! isset($data) ? $data['title_2'] : null !!}">
                        <label for="title_2">Titulo</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="direccion_2" name="direccion_2" class="form-control" value="{!! isset($data) ? $data['direccion_2'] : null !!}">
                        <label for="direccion_2">Dirección</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="central_telefono_1" name="central_telefono_1" class="form-control" value="{!!  isset($data) ? $data['central_telefono_1'] : null !!}">
                        <label for="central_telefono_1">Telefono 1</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="central_telefono_2" name="central_telefono_2" class="form-control" value="{!!  isset($data) ? $data['central_telefono_2'] : null !!}">
                        <label for="central_telefono_2">Telefono 2</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="correo_2" name="correo_2" class="form-control" value="{!!  isset($data) ? $data['correo_2'] : null !!}">
                        <label for="correo_2">Correo</label>
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
        CKEDITOR.replace('text');
        CKEDITOR.replace('text_valores');
        CKEDITOR.replace('text_mision');
        CKEDITOR.replace('text_vision');
        CKEDITOR.config.width = '100%';
    </script>
@stop
