<h2>Facilities information</h2>

<table>
    <tr>
        <td>Name</td>
    </tr>
    @foreach($data['property']['facilities'] as $facility_id)
        <tr>
            <td>{{ \App\Feature::find($facility_id)->first()->name }}</td>
        </tr>
    @endforeach
</table>
