<h2>Contact information</h2>

<table>
    <tr>
        <td>Contact person:</td>
        <td>{{ $data['contact']['person']['name'] }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $data['contact']['email'] }}</td>
    </tr>
    <tr>
        <td>Display email:</td>
        <td>{{ $data['contact']['email_display'] }}</td>
    </tr>
    <tr>
        <td>Phone number:</td>
        <td>{{ $data['contact']['phone'] }}</td>
    </tr>
    <tr>
        <td>Show phone number:</td>
        <td>{{ $data['contact']['phone_display'] }}</td>
    </tr>
    <tr>
        <td>Enable whatsapp:</td>
        <td>{{ $data['contact']['phone_whatsapp'] }}</td>
    </tr>
    <tr>
        <td>Additional phone:</td>
        <td>{{ $data['contact']['phoneAdditional'] }}</td>
    </tr>
    <tr>
        <td>Show additional phone:</td>
        <td>{{ $data['contact']['phoneAdditional_display'] }}</td>
    </tr>
    <tr>
        <td>Use whatsapp for additional phone:</td>
        <td>{{ $data['contact']['phoneAdditional_whatsapp'] }}</td>
    </tr>
    <tr>
        <td>Landline phone:</td>
        <td>{{ $data['contact']['phoneStat'] }}</td>
    </tr>
    <tr>
        <td>Show landine phone:</td>
        <td>{{ $data['contact']['phoneStat_display'] }}</td>
    </tr>
    <tr>
        <td>FAX:</td>
        <td>{{ $data['contact']['phone_fax'] }}</td>
    </tr>
</table>
