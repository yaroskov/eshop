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
                        <option {{$user->is_admin ? 'selected' : ''}}>Admin</option>
                        <option {{$user->is_admin ? '' : 'selected'}}>User</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-primary delete-user" data-id="{{$user->id}}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif