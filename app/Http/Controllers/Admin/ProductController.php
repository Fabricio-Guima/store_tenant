<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Product, Category, Store};
use Illuminate\Http\Request;

class ProductController extends Controller
{    

    public function __construct(private Product $product)
    {
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate(10);

        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Product $product)
    {
        $categories = $category->all("id", "name");

        return view('admin.products.create', ['categories' =>  $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store,Request $request)
    {
        //Conteúdo método store product
        $data = $request->all();

        $product = $store->first()->products()->create($data);
       

        $product->categories()->sync($request->categories);

        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao cadastrar produto']);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
         $categories = $category->all("id", "name");
         $product = $this->product->findOrFail($id);
         return view('admin.products.edit', ['categories' => $categories,'product' =>  $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->product->findOrFail($id);
        $product->update($request->all());

        $product->categories()->sync($request->categories);

        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao atualizar produto']);

        return redirect()->route('admin.products.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Conteúdo método destroy product
        $product = $this->product->findOrFail($id);

        $product->delete();

        session()->flash('message', ['type' => 'success', 'body' => 'Sucesso ao remover produto']);

        return redirect()->route('admin.products.index');
    }
}
