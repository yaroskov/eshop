@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h1>Huracan Cars!!!</h1>
                <h2>searching page</h2>

                <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
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

                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                        </div>
                    </div>

                    <select class="form-control">
                        <option>Lamborghini</option>
                    </select>

                    <select class="form-control">
                        <option>Huracan</option>
                    </select>

                    <div>years</div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>

                    <div>colors</div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                    </div>

                </form>

                <h2 class="mb-3">
                    Popular items...
                </h2>

                <div class="card text-white bg-primary mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="img/3i3eb7lbprp01.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-white bg-success mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="img/3i3eb7lbprp01.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-white bg-danger mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="img/3i3eb7lbprp01.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="card">--}}
                    {{--<div class="card-header">Dashboard</div>--}}

                    {{--<div class="card-body">--}}
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success" role="alert">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--You are logged in!--}}
                    {{--</div>--}}

                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection
