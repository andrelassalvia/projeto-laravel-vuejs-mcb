@extends('layouts.app')

@section('content')
    <register-component token_csrf="{{@csrf_token()}}"></register-component>
@endsection
