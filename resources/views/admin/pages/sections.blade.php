@extends('admin.index')

@section('admin-content')
    <h3 class="mb-3">Sections</h3>

    <div class="resultsBlock">
        @include('admin.tables.sections-table')
    </div>

    <div class="card-body">
        <form>
            <div class="form-group row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Section">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary add-row" data-url="add-section">Add</button>
                </div>
            </div>
        </form>
    </div>
@endsection