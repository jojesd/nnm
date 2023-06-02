<!DOCTYPE html>
<html>
<head>
    <title>Criar Produto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Criar Produto</h1>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Código:</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="images">Imagens (máximo de 5)</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*" max="5">
                    </div>
                    
                    <div class="form-group">
                        <label for="price">Preço:</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
