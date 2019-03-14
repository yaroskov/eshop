@if(isset($products) && count($products) > 0)
    @foreach($products as $product)
        <div class="card mb-3" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/img/no-image.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title mb-0">{{$product->name}}</h5>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-horizontal justify-content-md-end">
                                    <li class="list-group-item border-0 p-1">
                                        <button class="btn btn-sm btn-primary">Hide</button>
                                    </li>
                                    <li class="list-group-item border-0 p-1">
                                        <button class="btn btn-sm btn-primary">Delete</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="card-text mb-1"><small class="text-muted">{{$product->added_at}} by {{$product->username}}</small></p>
                        <p class="card-text">{{$product->description}}</p>

                        <div class="row">
                            <div class="col">

                                <div class="mb-2 ml-1">
                                    <a class="" href="#">{{$product->section}} / {{$product->subSection}}</a>
                                </div>

                                <table class="table table-borderless mb-1">
                                    <thead>
                                    <tr>
                                        <th class="p-1" colspan="3">Count: 777</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="p-1"><div class="preset-box bg-success"></div></td>
                                        <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="13"></td>
                                        <td class="p-1"><button class="btn btn-sm btn-primary">Apply</button></td>
                                    </tr>
                                    <tr>
                                        <td class="p-1"><div class="preset-box bg-success"></div></td>
                                        <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="666"></td>
                                        <td class="p-1"><button class="btn btn-sm btn-primary">Apply</button></td>
                                    </tr>
                                    <tr>
                                        <td class="p-1"><div class="preset-box bg-success"></div></td>
                                        <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="666"></td>
                                        <td class="p-1"><button class="btn btn-sm btn-success">+</button></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="col">

                                <div class="mb-2 ml-1">
                                    <a class="" href="#">{{$product->manufacturer}}</a>
                                </div>

                                <table class="table table-borderless mb-1">
                                    <thead>
                                    <tr>
                                        <th class="p-1" colspan="3">Cost: ${{$product->cost}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="p-1">$</td>
                                        <td class="p-1"><input class="form-control form-control-sm" type="text" placeholder="{{$product->cost}}"></td>
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
    @endforeach
@endif