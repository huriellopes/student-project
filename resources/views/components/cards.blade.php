@foreach($posts as $post)
    <div class="col-md-{{  $qtdRow }} col-sm-12">
        <div class="card mb-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post['title'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post['author']->name }} - Criado em: {{ \Carbon\Carbon::parse($post['created_at'])->format('d/m/Y') }}</h6>
                <p class="card-text">{{ $post['description'] }}</p>
                <a href="#" class="card-link">Visualizar</a>
            </div>
        </div>
    </div>
@endforeach
