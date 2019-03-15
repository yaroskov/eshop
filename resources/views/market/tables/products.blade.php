@if(isset($products) && count($products) > 0)
    @foreach($products as $product)
        <div class="card mb-3" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/img/no-image.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title mb-0">{{$product->name}}</h5>
                                <small class="text-muted">{{$product->added_at}} by {{$product->username}}</small>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-group list-group-horizontal justify-content-md-end">
                                    <li class="list-group-item border-0 p-1">
                                        <button class="btn btn-success">Add To Cart</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="card-text">{{$product->description}}</p>

                        <div class="row">
                            <div class="col">
                                <div class="mb-2 ml-0">
                                    <a class="" href="#">{{$product->section}} / {{$product->subSection}}</a>
                                </div>

                                <div class="card-text">
                                    Count: <h5 style="display: inline-block;">{{$product->totalCount}}</h5>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-2 ml-0">
                                    <a class="" href="#">{{$product->manufacturer}}</a>
                                </div>

                                <div class="card-text">
                                    Cost: <h5 style="display: inline-block;">${{$product->cost}}</h5>
                                </div>
                            </div>
                        </div>

                        <ul class="list-menu pl-0 mb-0">
                            <li class="">Colors:</li>
                            @foreach($product->counts as $count)
                                <li class="preset-box" style="background: {{'#' . $count->color->code}};"></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif