@extends('back.cards.template')

@section('form-open')
    <form method="post" action="{{ route('cards.store') }}">
                    {{ csrf_field() }}
                {{ method_field('POST') }}   
@endsection