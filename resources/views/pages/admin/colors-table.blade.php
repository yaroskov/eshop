@if(isset($colors) && count($colors) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Color</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($colors as $i => $color)
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$color->color}}</td>
                <td>
                    <button class="btn btn-primary delete-row" data-url="delete-color" data-id="{{$color->id}}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif