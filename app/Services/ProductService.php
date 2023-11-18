<?php

namespace App\Services;

use App\Http\Requests\CategoryRequests\CategoryCreateRequest;
use App\Http\Requests\ProductRequests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;

class ProductService{
    public function __construct( protected FileUploadService $uploadService, protected ProductRepository $repository ){

    }
    public function dataAllWithPaginate()
    {
        return $this->repository->paginate();
    }

    public function getAllData(){
        return Product::with('category')->get();
    }
    public function store(ProductRequest $request){
        $request = $request->validated();
        try {
            DB::beginTransaction();
            $img = $this->uploadService->uploadFile($request['img'], 'product');
            $request['img'] = $img;
            Product::create($request);
            DB::commit();
            self::ClearCached();
            return Product::class;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function update(CategoryCreateRequest $request, Product $model)
    {
        $request = $request->validated();
        try {
            DB::beginTransaction();
            $model = $model->update($request);
            DB::commit();
            self::ClearCached();
            return $model;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function destroy(Product $data)
    {
        self::ClearCached();
        Product::destroy($data->id);
    }
    public function destroyAll()
    {
        self::ClearCached();
        Product::where('id', '>', 0)->delete();
    }
    public function CachedCategory(){
        return Cache::rememberForever('categories', function () {
            return Product::all()->with('translations');
        });
    }
    public function ClearCached(){
        Cache::forget('categories');
    }
}
