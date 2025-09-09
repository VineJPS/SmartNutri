@extends('app')

@section('title', 'titulo da pagina aqui')

@section('css')
    {{-- css do conteudo aqui --}}
@endsection

@section('content')
    {{-- Conteudo html aqui --}}
@endsection

 return view('principal', compact('meta', 'consumidos', 'porcentagem', 'restantes'));