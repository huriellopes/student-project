@foreach($posts as $post)
    <div class="col-md-{{  $qtdRow }} col-sm-12">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post['title'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post['name'] }} - Criado em: {{ $post['created_at'] }}</h6>
                <p class="card-text">{{ $post['description'] }}</p>
                <a href="#" class="card-link">Visualizar</a>
            </div>
        </div>
    </div>
@endforeach
