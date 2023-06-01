<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::query();

        $pipes = [
            \App\Filters\Products\ByName::class,
            \App\Filters\Products\Pagination::class,
        ];

        // Filter records
        $products = 
            app(Pipeline::class)
                ->send($product)
                ->through($pipes)
                ->thenReturn()
                ->get();

        return $this->successResponse($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $result = Product::create($request->all());

        if(!$result)
            return $this->errorResponse('Error creating product');

        return $this->successResponse($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Product::find($id);

        if(!$result)
            return $this->errorResponse('Could not find resource');

        return $this->successResponse($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        Product::where('id', $id)
            ->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Product::destroy($id);

        if(!$result)
            return $this->errorResponse('Could not find resource');

        return $this->successResponse($result);
    }
}
