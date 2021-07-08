<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);"></div>
    <h2 style="margin-top:0;margin-bottom:0;display:inline-block;vertical-align:middle;">Account data</h2>
</div>

<table style="width:100%;margin-bottom:40px;">
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Pricing plan:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['plan'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Registration type:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['type'] }}</td>
    </tr>
    @if ($data['billing']['type'] == 'company')
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Company name:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['company'] }}</td>
    </tr>
    @endif
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Steuer ID Nr:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['stid'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Greeting:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['person']['addr'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">First name:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['person']['first_name'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Last Name:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['person']['last_name'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Street:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['address']['street'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">House:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['address']['house'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Postcode:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['address']['postcode'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">City:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['address']['city'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Country:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['billing']['address']['country'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Languages:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ implode(', ', array_keys(array_filter($data['languages'], function($item) { return $item == 1; }))) }}</td>
    </tr>
</table>
