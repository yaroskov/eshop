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
                            <input type="text" class="form-control mb-3" id="title" placeholder="Product's Title">
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-horizontal justify-content-md-end">
                                <li class="list-group-item border-0 p-1">
                                    <button class="btn btn-sm btn-success add-product" data-url="/admin/products/add">Add To Market</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="description" placeholder="Description of a product" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="mb-2 ml-1">
                                <button id="section" type="button" class="btn btn-sm btn-outline-primary menu-box-activator"
                                        data-id="0" data-el-id="0" data-param="section" data-toggle="modal" data-target="#sectionsModal">
                                    Section / Subsection
                                </button>
                            </div>

                            <table class="table table-borderless mb-1">
                                <thead>
                                <tr>
                                    <th class="p-1" colspan="3">Count: <span class="total-count">0</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-1"><div class="select-color preset-box" data-color-id="0"></div></td>
                                    <td class="p-1"><input class="count-value form-control form-control-sm" type="text" placeholder="0"></td>
                                    <td class="p-1"><button class="add-count btn btn-sm btn-success" data-url="/admin/products/color-counts/add">+</button></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col">

                            <div class="mb-2 ml-1">
                                <button id="manufacturer" type="button" class="btn btn-sm btn-outline-primary menu-box-activator"
                                        data-id="0" data-el-id="0" data-param="manufacturer" data-toggle="modal" data-target="#manufacturersModal">
                                    Manufacturer
                                </button>
                            </div>

                            <table class="table table-borderless mb-1">
                                <thead>
                                <tr>
                                    <th class="p-1" colspan="2">Cost:</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-1">$</td>
                                    <td class="p-1"><input id="cost" class="form-control form-control-sm" type="text" placeholder="0"></td>
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

    <div class="modal fade" id="manufacturersModal" data-id="0" data-param="manufacturer" tabindex="-1" role="dialog"
         aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 300px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Manufacturers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($manufacturers) > 0)
                        <ul class="menu-box list-group">
                            @foreach($manufacturers as $manufacturer)
                                <li class="menu-box-el list-group-item border-0 pt-2 pb-2"
                                    data-el-id="{{$manufacturer->id}}">{{$manufacturer->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary menu-box-ok" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sectionsModal" data-id="0" data-param="section" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 300px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sections</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($sections) > 0)
                        <ul class="menu-box menu-box-titled list-group">
                            @foreach($sections as $section)
                                <li class="menu-box-block list-group-item border-0 pt-2 pb-2">
                                    <h5 class="menu-box-title text-muted">{{$section['title']}}</h5>
                                    <ul class="list-group">
                                        @foreach($section['subSections'] as $subSection)
                                            <li class="menu-box-el list-group-item border-0 pt-2 pb-2"
                                                data-el-id="{{$subSection['id']}}">{{$subSection['value']}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary menu-box-ok" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection