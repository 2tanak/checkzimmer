<h2>Account data</h2>

<table>
    <tr>
        <td>Pricing plan:</td>
        <td>{{ $data['plan'] }}</td>
    </tr>
    <tr>
        <td>Registration type:</td>
        <td>{{ $data['billing']['type'] }}</td>
    </tr>
    @if ($data['billing']['type'] == 'company')
    <tr>
        <td>Company name:</td>
        <td>{{ $data['billing']['company'] }}</td>
    </tr>
    @endif
    <tr>
        <td>Steuer ID Nr:</td>
        <td>{{ $data['billing']['stid'] }}</td>
    </tr>
    <tr>
        <td>Greeting:</td>
        <td>{{ $data['billing']['person']['addr'] }}</td>
    </tr>
    <tr>
        <td>First name:</td>
        <td>{{ $data['billing']['person']['first_name'] }}</td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td>{{ $data['billing']['person']['last_name'] }}</td>
    </tr>
    <tr>
        <td>Street:</td>
        <td>{{ $data['billing']['address']['street'] }}</td>
    </tr>
    <tr>
        <td>House:</td>
        <td>{{ $data['billing']['address']['house'] }}</td>
    </tr>
    <tr>
        <td>Postcode:</td>
        <td>{{ $data['billing']['address']['postcode'] }}</td>
    </tr>
    <tr>
        <td>City:</td>
        <td>{{ $data['billing']['address']['city'] }}</td>
    </tr>
    <tr>
        <td>Country:</td>
        <td>{{ $data['billing']['address']['country'] }}</td>
    </tr>
    <tr>
        <td>Languages:</td>
        <td>{{ implode(', ', array_keys(array_filter($data['languages'], function($item) { return $item == 1; }))) }}</td>
    </tr>
</table>
