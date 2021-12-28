@extends('layouts.app')

@section('content')

    <x-panels.weather :weather="$weather"/>

    @foreach ($rates as $rate)
        <x-panels.valute :data="$rate"/>
    @endforeach

    <x-panels.resetButton/>

@endsection
