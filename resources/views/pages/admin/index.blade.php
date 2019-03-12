@section('admin_add')
    <script src="{{ asset('js/admin_add.js') }}"></script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="true">
                                Users
                            </a>
                            <a class="nav-link" id="v-pills-manufacturers-tab" data-toggle="pill" href="#v-pills-manufacturers" role="tab" aria-controls="v-pills-manufacturers" aria-selected="true">
                                Manufacturers
                            </a>
                            <a class="nav-link" id="v-pills-sections-tab" data-toggle="pill" href="#v-pills-sections" role="tab" aria-controls="v-pills-sections" aria-selected="true">
                                Sections
                            </a>
                            <a class="nav-link" id="v-pills-colors-tab" data-toggle="pill" href="#v-pills-colors" role="tab" aria-controls="v-pills-colors" aria-selected="true">
                                Colors
                            </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">

                                <h3>Users</h3>

                                <div class="resultsBlock">
                                    @include('pages.admin.users-table')
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="userType" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                                            <div class="col-md-6">
                                                <select id="userType" class="form-control">
                                                    <option value="user" selected>User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button id="register-user" type="button" class="btn btn-primary">
                                                    {{ __('Register New') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-manufacturers" role="tabpanel" aria-labelledby="v-pills-manufacturers-tab">

                                <h3 class="mb-3">Manufacturers</h3>

                                <div class="resultsBlock">
                                    @include('pages.admin.data-table')
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="inputManufacturer" placeholder="Manufacturer">
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addManufacturer" type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-sections" role="tabpanel" aria-labelledby="v-pills-sections-tab">

                                <h3 class="mb-3">Sections</h3>

                            </div>

                            <div class="tab-pane fade" id="v-pills-colors" role="tabpanel" aria-labelledby="v-pills-colors-tab">

                                <h3 class="mb-3">Colors</h3>

                                <div class="resultsBlock">
                                    @include('pages.admin.colors-table')
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="inputColor" placeholder="Color">
                                            </div>
                                            <div class="col-md-2">
                                                <button id="addColor" type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
