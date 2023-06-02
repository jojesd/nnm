<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();

        return view('dashboard', compact('products'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'price' => $request->input('price'),
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            $uploadedImages = $request->file('images');
        
            foreach ($uploadedImages as $uploadedImage) {
                if ($uploadedImage->isValid()) {
                    $fileName = $uploadedImage->getClientOriginalName();
                    $uploadedImage->move(public_path('images'), $fileName);
                    $images[] = $fileName;
                }
            }
        }
        
        // Criação do produto no banco de dados
        $product = new Product();
        // Defina os atributos do produto (nome, código, preço, etc.)
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->save();
        
        // Criação das imagens do produto
        foreach ($images as $image) {
            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->image = $image;
            $productImage->save();
        }
        
        // Redirecionamento ou outras ações após a criação do produto
        

// Redirecionamento ou outras ações após a criação do produto



        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
