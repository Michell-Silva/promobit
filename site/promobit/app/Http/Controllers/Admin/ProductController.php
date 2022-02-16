<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));

    }


    public function create()
    {
        $tags = Tag::all('id', 'name');
        return view('admin.products.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
        ],[
            "name.unique" => "O nome já foi escolhido."
        ]);

        $data = $request->all();

        $tags = $request->get('tags', null);

        $product = $this->product->create($data);
        $product->tags()->sync($tags);

        flash("Produto '{$product->name}' cadastrado com sucesso!")->success();

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = $this->product::findOrFail($id);
        $tags = Tag::all('id', 'name');
        return view('admin.products.edit', compact('product','tags'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
        ],[
            "name.unique" => "O nome já foi escolhido."
        ]);

        $data = $request->all();
        $tags = $request->get('tags', null);

        $product = $this->product::find($id);
        $product->update($data);

        if(!is_null($tags)) {
            $product->tags()->sync($tags);
        }

        flash("Produto '{$request->name}' atualizado com sucesso!")->success();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = $this->product::find($id);
        $product->delete();

        flash("Produto '{$product->name}' excluido com sucesso!")->success();

        return redirect()->route('admin.products.index');
    }
}
