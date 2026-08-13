@extends('layouts/app')

@section('title')
Home Page
@endsection

@section('content')
<h1>{ title }</h1>

@if($isAdmin)
    <p>Admin kullanıcısı</p>
@else
    <p>Normal kullanıcı</p>
@endif
@endsection