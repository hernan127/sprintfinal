<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $limit = 10;
      $products = Product::make()->paginate($limit);
      return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reglas = [
          'name' => 'required',
          'description' => 'required',
          'price' => 'required',
          'stock' => 'nullable',
      ];

      $mensajes = [
          'required' => 'El campo :attribute es obligatorio'
      ];

      $this->validate($request, $reglas, $mensajes);
      $photopath = $request->file('imageLoc')->store('imageLoc', 'public');
      $product = new Product($request->all());
      $product->imageLoc = $photopath;
      $product->save();

      return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);
      return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      return view('products.edit')
          ->with('product', $product);
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
      $reglas = [
          'name' => 'required',
          'description' => 'required',
          'price' => 'required',
          'stock' => 'nullable',
      ];

      $mensajes = [
          'required' => 'El campo :attribute es obligatorio'
      ];

      $this->validate($request, $reglas, $mensajes);

      $product = Product::find($id);
         $product->name = $request->input('name') !== $product->name ? $request->input('name') : $product->name;
         $product->description = $request->input('description') !== $product->description ? $request->input('description') : $product->description;
         $product->price = $request->input('price') !== $product->price ? $request->input('price') : $product->price;
         $product->stock = $request->input('stock') !== $product->stock ? $request->input('stock') : $product->stock;

         // $photopath = $request->file('imageLoc')->store('imageLoc', 'public');
         // 
         // $product->imageLoc = $photopath != $product->imageLoc ? $request->input('imageLoc') : $product->imageLoc;

         $product->save();

         return redirect("/products/" . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
