@extends('layouts.site')

@section('css')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <x-card>
                @slot('qtdRow', 4)
                @slot('posts', $posts)
            </x-card>
        </div>
    </div>
@stop

@section('js')
@stop
