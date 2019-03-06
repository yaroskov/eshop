@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon1">Phone Market Logo</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>


                </form>

                <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height: 200px;">
                        <div class="carousel-item active">
                            <img src="img/3i3eb7lbprp01.jpg" class="d-block w-100" alt="ferrari yellow">
                        </div>
                        <div class="carousel-item">
                            <img src="img/ferrari_458_italia_avto_vid_sboku_chernyj_99758_1920x1080.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/ukyQnjc.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>

                    <div class="col-md-9">
                        <h2 class="mb-3">
                            Popular items...
                        </h2>
                    </div>
                </div>

                <div id="output" class="row">
                    <div class="col-md-3">
                        <div class="">
                            @if(isset($manufacturers))
                                <select class="form-control mb-3">
                                    @foreach($manufacturers as $manufacturer)
                                        <option>{{$manufacturer->name}}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if(isset($products))
                                <select class="form-control mb-3">
                                    @foreach($products as $product)
                                        <option>{{$product->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        @if(isset($storage))
                            <div class="mb-3">
                                <h6>Storage</h6>

                                @for($i = 0; $i < count($storage); $i++)
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" id="storageCheck{{$i}}" value="option1">
                                        <label class="form-check-label" for="storageCheck{{$i}}">{{$storage[$i]->value}}</label>
                                    </div>
                                @endfor
                            </div>
                        @endif

                        @if(isset($colors))
                            <div class="mb-3">
                                <h6>Colors</h6>

                                @for($i = 0; $i < count($colors); $i++)
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" id="colorsCheck{{$i}}" value="option1">
                                        <label class="form-check-label" for="colorsCheck{{$i}}">{{$colors[$i]->color}}</label>
                                    </div>
                                @endfor
                            </div>
                        @endif
                    </div>

                    <div class="col-md-9">
                        @if(isset($products))
                            @foreach($products as $product)
                                <div class="card text-white bg-primary mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="img/n4.jpg" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-header">Header</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <p class="card-text">{{$product->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
