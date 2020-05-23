@extends('layouts.site')

@section('css')
@stop

@section('content')
    <div class="container">
        <div class="row">
            @if (count($posts) > 0)
                <x-card>
                    @slot('qtdRow', 4)
                    @slot('posts', $posts)
                </x-card>
            @else
                <div class="col-md-12 col-sm-12 text-center">
                    <span>Nenhum Post Encontrado!</span>
                </div>
            @endif
        </div>
    </div>
@stop

@section('js')
@stop
