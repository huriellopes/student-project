@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
@stop

@section('content')
@stop
@section('js')
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/postList.js') }}"></script>
@stop
