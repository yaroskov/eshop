@if(isset($sections) && count($sections) > 0)
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Section</th>
        </tr>
        </thead>
        <tbody>
        @php $n = 0 @endphp
        @foreach($sections as $i => $section)
            @if($section->section_id == 0)
                @php $n++ @endphp
                <tr>
                    <th scope="row">{{$n}}</th>
                    <td>
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{$section->value}}</th>
                                <th scope="col">
                                    <button class="btn btn-sm btn-dark delete-row" data-url="delete-section" data-id="{{$section->id}}">Delete</button>
                                    @php $section_id = $section->id @endphp
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $sn = 0 @endphp
                            @foreach($sections as $j => $section)
                                @if($section->section_id == $section_id)
                                    @php $sn++ @endphp
                                    <tr>
                                        <th scope="row">{{$sn}}</th>
                                        <td>{{$section->value}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary delete-row" data-url="delete-section" data-id="{{$section->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            <tr class="form-group">
                                <th scope="row">+</th>
                                <td>
                                    <input type="text" class="form-control bg-transparent" placeholder="Subsection">
                                </td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-sm btn-dark add-sub-row" data-url="add-section"
                                            data-section-id="{{$section_id}}">+</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endif