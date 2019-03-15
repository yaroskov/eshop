@extends('market.index')

@section('admin-content')
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

    <div class="resultsBlock">
        @include('market.tables.products')
    </div>
@endsection