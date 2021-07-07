<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;"></div>
    <h2 style="margin-top:0;margin-bottom:0;vertical-align:middle;display:inline-block;">Contact information</h2>
</div>

<table style="width:100%;margin-bottom:40px;">
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Contact person:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['person']['name'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Email:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['email'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Display email:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['email_display'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Phone number:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phone'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Show phone number:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phone_display'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Enable whatsapp:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phone_whatsapp'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Additional phone:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phoneAdditional'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Show additional phone:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;;">{{ $data['contact']['phoneAdditional_display'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Use whatsapp for additional phone:</td>
        <td style="width:10%;"></td>
        <td style=width:80%;">{{ $data['contact']['phoneAdditional_whatsapp'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Landline phone:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phoneStat'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">Show landine phone:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phoneStat_display'] }}</td>
    </tr>
    <tr>
        <td style="width:20%;background-color:#f3f3f3;">FAX:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['contact']['phone_fax'] }}</td>
    </tr>
</table>
