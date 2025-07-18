@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">{{ trans('forms.title') }}</h1>
    @include('components.form')
@endsection