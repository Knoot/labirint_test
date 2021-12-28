@props(['data'])
<div id="valute{{ $data['charCode'] }}" class="exchange">
    <div class="rate">1 {{ $data['charCode'] }} = {{ $data['value'] }} RUB</div>
    <div class="description">{{ $data['description']}}</div>
</div>
