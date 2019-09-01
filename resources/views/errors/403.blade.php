@extends('errors.layout')

@section('content')
    @include('errors.partial', ['number' => '403', 'message' => 'This action is unauthorized'])
@endsection