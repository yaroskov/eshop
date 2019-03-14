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
                <td>
                    <button class="btn btn-primary delete-row" data-url="delete-manufacturer" data-id="{{$manufacturer->id}}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif