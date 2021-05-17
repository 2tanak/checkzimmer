@if ($hotel->getCurrentOption('landlordLanguages') && $hotel->getCurrentOption('landlordLanguages') != 'de' )
    <div class="speaks">{{ $hotel->getCurrentOption('landlordSpeaks') ?: __('Object owner speaks') }}:</div>
    <div class="language-item">{{ $hotel->getCurrentOption('landlordLanguages') }}</div>
@endif
