<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;"></div>
    <h2 style="margin-top:0;margin-bottom:0;vertical-align:middle;display:inline-block;">Media</h2>
</div>

<div class="mail-pictures-block" style="display:flex;flex-wrap:wrap;">
    @foreach ($data['property']['media']['photos'] as $photo)
        <img src="{{ $photo }}" width="200px" style="margin-right:20px;margin-bottom:20px" />
    @endforeach
</div>

<div class="title-block" style="margin-bottom:20px;">
    <div style="width:3px;height:20px;background: linear-gradient(232.88deg, #0F7FEB -6.69%, #00CEFF 114.04%);margin-right:10px;display:inline-block;vertical-align:middle;margin-left:5px;"></div>
    <h2 style="margin-top:0;margin-bottom:0;vertical-align:middle;display:inline-block;">Media links</h2>
</div>

<table style="width:100%;">
    <tr>
        <td style="background-color:#f3f3f3;width:20%;">Facebook link:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['property']['media']['facebook'] }}</td>
    </tr>
    <tr>
        <td style="background-color:#f3f3f3;width:20%;">Video link:</td>
        <td style="width:10%;"></td>
        <td style="width:80%;">{{ $data['property']['media']['video'] }}</td>
    </tr>
</table>
