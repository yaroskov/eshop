@if(isset($sections) && count($sections) > 0)
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Section</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sections as $i => $section)
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$section->value}}</td>
                <td>
                    <button class="btn btn-primary delete-row" data-url="delete-section" data-id="{{$section->id}}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif