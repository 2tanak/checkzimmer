<h2>Peoperty information</h2>

<table>
    <tr>
        <td>Peoperty</td>
        <td>Number</td>
        <td>Persons</td>
        <td>Price</td>
    </tr>
    @foreach($data['property']['propertyTypes'] as $type)
        <tr>
            <td>{{ $type['name'] }}</td>
            <td>{{ $type['num'] }}</td>
            <td>{{ $type['persons'] }}</td>
            <td>{{ $type['price'] }}</td>
        </tr>
        @foreach ($type['rooms'] as $room)
            <tr>
                <td>{{ $room['name'] }}</td>
                <td>{{ $room['num'] }}</td>
                <td>{{ $room['persons'] }}</td>
                <td>{{ $room['price'] }}</td>
            </tr>
        @endforeach
    @endforeach
</table>
