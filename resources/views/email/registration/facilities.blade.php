<h2>Facilities information</h2>

<table>
    <tr>
        <td>{{ __('Category') }}</td>
        <td>{{ __('Name') }}</td>
    </tr>
    @foreach($data['property']['features'] as $feature)
        <tr>
            <td>{{ $feature->feature_category->name }}</td>
            <td><img src="{{ $data['domain'].$feature->picture }}" /> {{ $feature->name }}</td>
        </tr>
    @endforeach
</table>
