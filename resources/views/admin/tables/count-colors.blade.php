<table class="table table-borderless mb-1">
    <thead>
    <tr>
        <th class="p-1" colspan="3">Count: 0</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($data) && count($data) > 0)
        @foreach($data as $datum)
            <tr>
                <td class="p-1"><div class="select-color preset-box" data-color-id="{{$datum['color']}}"></div></td>
                <td class="p-1"><input class="count-value form-control form-control-sm" type="text" value="{{$datum['count']}}" placeholder="0"></td>
                <td class="p-1"><button class="add-count btn btn-sm btn-primary" data-url="/admin/products/delete-count">-</button></td>
            </tr>
        @endforeach
    @endif
    <tr>
        <td class="p-1"><div class="select-color preset-box" data-color-id="0"></div></td>
        <td class="p-1"><input class="count-value form-control form-control-sm" type="text" placeholder="0"></td>
        <td class="p-1"><button class="add-count btn btn-sm btn-success" data-url="/admin/products/add-count">+</button></td>
    </tr>
    </tbody>
</table>