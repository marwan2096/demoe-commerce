<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;

use App\Http\Resources\ProductsResource;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductsController extends Controller
{

    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ProductsResource::collection(
            Product::all()
        );
    }
    
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreProductRequest $request)
    {
        $request->validated($request->all());

        $product = Product::create([
            // 'user_id' => Auth::user()->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
           'category_id' =>$request->category_id,
        ]);

        return new ProductsResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
        public function show(Product $product)
    {
        return  new ProductsResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     *
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(Auth::user()->id !== $product->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
        $product->update($request->all());
        return new ProductsResource($product);;

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $this->isNotAuthorized($product) ? $this->isNotAuthorized($product) : $product->delete();
    }


    private function isNotAuthorized($product){

        if(Auth::user()->id !== $product->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }


    }




}
