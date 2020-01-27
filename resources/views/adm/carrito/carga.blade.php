@extends('adm.layouts.app')

@section('content')

    <div class="container p-4">
        <div class="container">
            <a href="{{ route('excel.productos') }}" class="btn btn-warning btn-md mt-0">Exportar Productos</a>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Carga de Productos</h5>
                <p class="card-text">Para hacer la carga de productos mediante un archivo Excel, deberá cumplir lo siguiente:</p>
                <ol>
                    <li>El archivo debe guardarlo en formato xlsx</li>
                    {{--<li>No tener CABECERA en la tabla</li>--}}
{{--                    <li>Este archivo debe estar estructurado por columnas, las cuales deberan ser cada campo de la tabla. Deberán ser 6 columnas.--}}
{{--                        <ul>--}}
{{--                            <li>[A] FV</li>--}}
{{--                            <li>[B] Modelo</li>--}}
{{--                            <li>[C] Desde</li>--}}
{{--                            <li>[D] Hasta</li>--}}
{{--                            <li>[E] OEM</li>--}}
{{--                            <li>[F] Marca</li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ol>
                {{--<p class="card-text">En el caso de no poseer algún campo, dejar vacío la celda.</p>--}}

                <hr>
                <form action="{{ route('productos.carga') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Carga</span>
                                </div>
                                <div class="custom-file">
                                    <input name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" data-browser="Subir" for="inputGroupFile01">Seleccione archivo</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success d-block mx-auto text-uppercase">cargar</button>
                        </div>
                    </div>
                </form>
            </div>
{{--            <div class="card-footer text-muted">--}}
{{--                <h5>Campos:</h5>--}}
{{--                <ul class="mb-0">--}}
{{--                    <li><strong>OEM</strong> Si posee más de uno, separar por guión (xxxx - yyyy)</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
