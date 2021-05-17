<h1>{{ __('Rent Inquiry') }}</h1>

<h2>{{ __('Personal info') }}</h2>

<strong>{{ __('From') }}:</strong> {{ $data['name'] }}

@if ($data['company'] ?? false)
    <p><strong>{{ __('Company') }}:</strong> {{ $data['company'] }}</p>
@endif

<h2>{{ __('Contact info') }}</h2>

<p><strong>{{ __('Phone') }}:</strong> {{ $data['telephone'] }}</p>
<p><strong>{{ __('Email') }}:</strong> {{ $data['email'] }}</p>

<h2>{{ __('Inquiry details') }}</h2>

<p><strong>{{ __('Hotel') }}:</strong> {{ $hotel->name ?? 'Unknown'}}</p>
<p><strong>{{ __('Language') }}:</strong> {{ $data['language'] }}</p>

@if (($data['arrival-date'] ?? false) || ($data['date-departure'] ?? false))
    <p><strong>{{ __('Check-in') }}:</strong> {{ ($data['arrival-date'] ?? false) ? $data['arrival-date'] : __('not specified') }}</p>
    <p><strong>{{ __('Check-out') }}:</strong> {{ ($data['date-departure'] ?? false) ? $data['date-departure'] : __('not specified') }}</p>
@endif

<p><strong>{{ __('Persons number') }}:</strong> {{ $data['number-persons'] }}</p>
<p><strong>{{ __('Accommodation type') }}:</strong> {{ $data['type'] }}</p>

<h2>{{ __('Message from client') }}</h2>

<p>{{ $data['message'] }}</p>
