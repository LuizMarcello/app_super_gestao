@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Home')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')
   <br><br><br><br>Home
@endsection
