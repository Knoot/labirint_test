@props(['weather'])
<div class="weather">
    @if (isset($weather['error']))
        {{ $weather['error']->getMessage() }}
    @else
        <div class="city">{{ $weather['city'] }}</div>
        <div class="date">{{ $weather['date'] }}</div>
        <div class="temperature">Температура <div class="value">{{ $weather['temperature'] }}°</div></div>
        <div class="temperature">Ощущается как <div class="value">{{ $weather['comfort'] }}°</div></div>
        <div class="description">{{ $weather['description'] }}</div>
    @endif
</div>
