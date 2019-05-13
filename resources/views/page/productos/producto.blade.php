@extends('page.layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne1">
                            <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                               aria-controls="collapseOne1">
                                <h5 class="mb-0">
                                    Collapsible Group Item #1 <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                labore sustainable VHS.
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                               aria-expanded="false" aria-controls="collapseTwo2">
                                <h5 class="mb-0">
                                    Collapsible Group Item #2 <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                labore sustainable VHS.
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingThree3">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                               aria-expanded="false" aria-controls="collapseThree3">
                                <h5 class="mb-0">
                                    Collapsible Group Item #3 <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                labore sustainable VHS.
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                </div>
                <!-- Accordion wrapper -->
            </div>
            <div class="col-md-8">
                <div class="row my-5">
                    <div class="col-md-6">
                        <img src="{{ asset($productos->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4 class="">{!! $productos->title !!}</h4>
                        {!! $productos->text !!}
                    </div>
                </div>
                <h4 class="">Cierres Posibles</h4>
                <div class="row">
                    {{--@dd($productos->closure)--}}
                    @forelse($productos->closure as $cierre)
                        <div class="col-md-2 my-4">
                            <img src="{{ asset($cierre->image) }}" alt="" class="img-fluid" style="height: 100px;">
                        </div>
                    @empty

                    @endforelse
                </div>

                <example-component :producto="{{ $productos->capacity }}"></example-component>

            </div>
        </div>
    </div>

@endsection
