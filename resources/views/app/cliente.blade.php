@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Cliente')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')
   <br><br><br><br>Cliente
@endsection
