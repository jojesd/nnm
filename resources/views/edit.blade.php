<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar Produto</h1>
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Código:</label>
                        <input type="text" name="code" class="form-control" value="{{ $product->code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagem:</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="price">Preço:</label>
                        <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
