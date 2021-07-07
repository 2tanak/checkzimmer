<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;"></div>
    <h2 style="margin-top:0;margin-bottom:0;vertical-align:middle;display:inline-block;">Peoperty information</h2>
</div>

<table style="width:100%;margin-bottom:40px;">
    <tr>
        <td style="width: 25%;background-color:#f3f3f3;">Peoperty</td>
        <td style="text-align:center;width: 25%;background-color:#f3f3f3;">Number</td>
        <td style="text-align:center;width: 25%;background-color:#f3f3f3;">Persons</td>
        <td style="text-align:center;width: 25%;background-color:#f3f3f3;">Price</td>
    </tr>
    @foreach($data['property']['propertyTypes'] as $type)
        <tr>
            <td style="width: 25%;">{{ $type['name'] }}</td>
            <td style="text-align:center;width: 25%;">{{ $type['num'] }}</td>
            <td style="text-align:center;width: 25%;">{{ $type['persons'] }}</td>
            <td style="text-align:center;width: 25%;">{{ $type['price'] }}</td>
        </tr>
        @foreach ($type['rooms'] as $room)
            <tr>
                <td style="width: 25%;">{{ $room['name'] }}</td>
                <td style="text-align:center;width: 25%;">{{ $room['num'] }}</td>
                <td style="text-align:center;width: 25%;">{{ $room['persons'] }}</td>
                <td style="text-align:center;width: 25%;">{{ $room['price'] }}</td>
            </tr>
        @endforeach
    @endforeach
</table>
