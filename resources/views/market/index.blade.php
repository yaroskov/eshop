@section('admin_add')
    <script src="{{ asset('js/admin_add.js') }}"></script>
    <script src="{{ asset('js/menu-url.js') }}"></script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="row">
                    <div class="col-3">
                        <nav id="menu-url" class="nav nav-pills flex-column">
                            <a class="nav-link" href="#">Sections</a>
                            <a class="nav-link" href="#">Manufacturers</a>
                        </nav>
                    </div>
                    <div class="col-9">
                        <div class="tab-pane">
                            @yield('admin-content')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
