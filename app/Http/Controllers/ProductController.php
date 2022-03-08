<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    public function index()
    {
        // DBよりProductテーブルの値を全て取得
        $products = Product::all();
        $products = Product::sortable()->paginate(10);//1ページに10件表示
              
        // 取得した値をビュー「product/index」に渡す
        return view('product/index', compact('products'));
    }

    public function edit($id)
    {
        // DBよりURIパラメータと同じIDを持つProductの情報を取得
        $product = Product::findOrFail($id);

        // 取得した値をビュー「product/edit」に渡す
        return view('product/edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->save();

        return redirect("/product");
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect("/product");
    }

    public function create()
    {
        $product = new Product();
        return view('product/create', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->save();

        return redirect("/product");
    }

    public function show($id)
    {
        return view('product', ['product' => Product::findOrFail($id)]);
    }
}