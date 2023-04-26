@extends('layout.app')


@section('title', $title)


@section('script')

@endsection


@section('main')

<h1>{{ $title }}</h1>

@include('component.reload-button')

@endsection