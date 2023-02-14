<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CategoriesResource;
use App\Http\Requests\StoreCategoriesRequest;

class CategoriesController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoriesResource::collection(
              Category::all()
        );
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreCategoriesRequest $request)
    {
        $request->validated($request->all());

        $Category = Category::create([
         
            'name' => $request->name,
            'desc' => $request->desc,
            
           
        ]);

        return new CategoriesResource($Category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
        public function show(Category $Category)
    {
        return  new CategoriesResource($Category);

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
    public function update(Request $request, Category $Category)
    {
        // if(Auth::user()->id !== $Category->user_id) {
        //     return $this->error('', 'You are not authorized to make this request', 403);
        // }
        $Category->update($request->all());
        return new CategoriesResource($Category);;

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        return $this->isNotAuthorized($Category) ? $this->isNotAuthorized($Category) : $Category->delete();
    }


    private function isNotAuthorized($Category){

        if(Auth::user()->id !== $Category->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }


    }

}
