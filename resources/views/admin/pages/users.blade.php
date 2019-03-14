@extends('admin.index')

@section('admin-content')
    <h3>Users</h3>

    <div class="resultsBlock">
        @include('admin.tables.users-table')
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
@endsection