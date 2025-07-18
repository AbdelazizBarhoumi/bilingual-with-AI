@extends('layouts.app')
@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $locale === 'en' ? 'Privacy Policy' : 'Politique de confidentialité' }}</h1>
    <p>{{ $locale === 'en' ? 'Your data is processed securely and not shared with third parties.' : 'Vos données sont traitées en toute sécurité et ne sont pas partagées avec des tiers.' }}</p>
@endsection