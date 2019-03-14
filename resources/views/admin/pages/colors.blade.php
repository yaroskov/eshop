@extends('admin.index')

@section('admin-content')
    <h3 class="mb-3">Colors</h3>

    <div class="resultsBlock">
        @include('admin.tables.colors-table')
    </div>

    <div class="card-body">
        <form>
            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Color">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary add-row" data-url="add-color">Add</button>
                </div>
            </div>
        </form>
    </div>
@endsection