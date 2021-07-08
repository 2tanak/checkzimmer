<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;"></div>
    <h2 style="margin-top:0;margin-bottom:0;vertical-align:middle;display:inline-block;">Facilities information</h2>
</div>

<table>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">{{ __('Category') }}</td>
        <td>{{ __('Name') }}</td>
    </tr>
    @foreach($data['property']['features'] as $feature)
        <tr>
            <td style="width:20%;background-color:#f3f3f3;">{{ $feature->feature_category->name }}</td>
            <td><img src="{{ $data['domain'].$feature->picture }}" /> {{ $feature->name }}</td>
        </tr>
    @endforeach
</table>
