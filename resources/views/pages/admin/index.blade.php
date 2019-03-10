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
                                Users


                                @if(isset($users))
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">User Type</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $i => $user)
                                                <tr>
                                                    <th scope="row">{{$i + 1}}</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>
                                                                @if($user->is_admin)
                                                                    Admin
                                                                @else
                                                                    User
                                                                @endif
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary">Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif


                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>
                            <div class="tab-pane fade" id="v-pills-manufacturers" role="tabpanel" aria-labelledby="v-pills-manufacturers-tab">
                                Manufacturers

                                @if(isset($manufacturers) && count($manufacturers) > 0)
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Added at</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($manufacturers as $i => $manufacturer)
                                                <tr>
                                                    <th scope="row">{{$i + 1}}</th>
                                                    <td>{{$manufacturer->name}}</td>
                                                    <td>{{$manufacturer->added_at}}</td>
                                                    <td><button class="btn btn-primary">Delete</button></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="inputManufacturer" placeholder="Manufacturer">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button id="addManufacturer" type="button" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="v-pills-sections" role="tabpanel" aria-labelledby="v-pills-sections-tab">
                                Sections
                            </div>
                            <div class="tab-pane fade" id="v-pills-colors" role="tabpanel" aria-labelledby="v-pills-colors-tab">
                                Colors
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
