<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Produtos</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Criar Produto</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2">Sair</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Código</th>
                            <th>Imagens</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>
                                @foreach($product->images as $image)
                                    @if($image->image)
                                        <img src="{{ asset('images/' . $image->image) }}" width="50" height="50" alt="Imagem do produto">
                                    @else
                                        N/A
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>