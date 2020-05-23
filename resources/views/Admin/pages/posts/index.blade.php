@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" />
@stop

@section('content')
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">Posts</div>

            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-12 text-right">
                        <a href="{{ route('posts/create') }}" class="btn btn-outline-primary">New Post</a>
                    </div>
                </div>

                <div class="row" id="loading">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span>Carregando dados!</span>
                        </div>
                    </div>
                </div>

                <div class="row" id="tabela" style="display: none;">
                    <div class="col-md-12">
                        <table class="table table-bordered datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>description</th>
                                <th>author</th>
                                <th>Status</th>
                                <th>criado em</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('fontawesome/js/all.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/locales/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/funcoes_globais.js') }}"></script>
    <script src="{{ asset('js/posts/postList.js') }}"></script>
@stop
