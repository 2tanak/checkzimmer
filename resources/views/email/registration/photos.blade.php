<h2>Media</h2>

@foreach ($data['property']['media']['photos'] as $photo)
    <img src="{{ $photo }}" width="200px" /><br><br>
@endforeach

<table>
    <tr>
        <td>

        </td>
    </tr>
</table>

<h2>Media links</h2>
Facebook link: {{ $data['property']['media']['facebook'] }}<br>
Video link: {{ $data['property']['media']['video'] }}
