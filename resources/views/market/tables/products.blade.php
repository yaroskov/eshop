@if(isset($products) && count($products) > 0)
    @foreach($products as $product)
        <div class="card mb-3" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/img/no-image.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{$product->name}}</h5>
                        <p class="card-text mb-1"><small class="text-secondary">Last Updated On {{$product->added_at}}</small></p>

                        <p class="card-text">{{$product->description}}</p>

                        <div class="row">
                            <div class="col">
                                <div class="mb-2 ml-0">
                                    <a class="" href="#">{{$product->section}} / {{$product->subSection}}</a>
                                </div>

                                <div class="card-text">
                                    <span class="text-secondary">Count:</span>
                                    <h5 style="display: inline-block;">{{$product->totalCount}}</h5>
                                </div>

                                <ul class="list-menu pl-0 mb-0">
                                    <li class="">Colors:</li>
                                    @foreach($product->counts as $count)
                                        <li class="preset-box" style="background: {{'#' . $count->color->code}};"></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-md-5">
                                <div class="mb-2 ml-0">
                                    <a class="" href="#">{{$product->manufacturer}}</a>
                                </div>

                                <div class="card-text">
                                    <span class="text-secondary">Cost:</span>
                                    <h5 style="display: inline-block;">${{$product->cost}}</h5>
                                </div>

                                <button class="btn btn-success">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif