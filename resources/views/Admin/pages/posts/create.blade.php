@extends('layouts.app')

@section('css')
    <style>
        #content {
            resize: vertical;
        }
    </style>
@stop

@section('content')
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header text-center">New Post</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <form action="{{ route('posts.create') }}" method="POST" autocomplete="off" id="postForm">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title">Titulo</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Título do post" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" class="form-control" id="description" placeholder="Pequena Descrição do post" />
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="content">Conteúdo</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="O conteúdo do post"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 text-right">
                                    <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/funcoes_globais.js') }}"></script>
    <script src="{{ asset('js/posts/createPost.js') }}"></script>
@stop
