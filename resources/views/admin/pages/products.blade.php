@extends('admin.index')

@section('admin-content')
    <h3 class="mb-3">Products</h3>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Hidden</a>
        </li>
    </ul>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Type something" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
    </div>

    <ul class="nav nav-pills justify-content-center mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Date <span>▾</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Popularity <span>▾</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Cost <span>▾</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Count <span>▾</span></a>
        </li>
    </ul>

    <div class="card border-success mb-3" style="">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/no-image.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Product's Title">
                            {{--<h5 class="card-title mb-0">Product's Title</h5>--}}
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-horizontal justify-content-md-end">
                                <li class="list-group-item border-0 p-1">
                                    <button class="btn btn-sm btn-success">Add To Market</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        {{--<label for="exampleFormControlTextarea1">Description of a product</label>--}}
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Description of a product" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="mb-2 ml-1">
                                <a class="" href="#">Section / Subsection</a>
                            </div>

                            <table class="table table-borderless mb-1">
                                <thead>
                                <tr>
                                    <th class="p-1" colspan="3">Count: 777</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($product->counts as $count)--}}
                                {{--<tr>--}}
                                {{--<td class="p-1"><div class="preset-box" style="background: {{'#' . $count->color->code}};"></div></td>--}}
                                {{--<td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="{{$count->count}}"></td>--}}
                                {{--<td class="p-1"><button class="btn btn-sm btn-primary">Apply</button></td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                <tr>
                                    <td class="p-1"><div class="preset-box"></div></td>
                                    <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="1"></td>
                                    <td class="p-1"><button class="btn btn-sm btn-success">+</button></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col">

                            <div class="mb-2 ml-1">
                                <a class="" href="#">Manufacturer</a>
                            </div>

                            <table class="table table-borderless mb-1">
                                <thead>
                                <tr>
                                    <th class="p-1" colspan="3">Cost: $666</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-1">$</td>
                                    <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="666"></td>
                                    <td class="p-1"><button class="btn btn-sm btn-primary">Apply</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="resultsBlock">
        @include('admin.tables.products')
    </div>
@endsection