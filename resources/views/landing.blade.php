@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">{{ trans('forms.success') }}</h1>
        <a href="{{ route('download', ['pdf' => basename($pdfUrl)]) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
            {{ trans('forms.download') }}
        </a>
    </div>
@endsection