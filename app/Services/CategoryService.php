<?php

namespace App\Services;

use App\Http\Requests\CategoryRequests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CategoryService{
    public function getAllData(){
        return Category::get();
    }
    public function store(CategoryCreateRequest $request){
        $request = $request->validated();
        try {
            DB::beginTransaction();
            Category::create($request);
            DB::commit();
            self::ClearCached();
            return Category::class;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function update(CategoryCreateRequest $request, Category $model)
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
    public function destroy(Category $data)
    {
        self::ClearCached();
        Category::destroy($data->id);
    }
    public function destroyAll()
    {
        self::ClearCached();
        Category::where('id', '>', 0)->delete();
    }
    public function CachedCategory(){
        return Cache::rememberForever('categories', function () {
            return Category::all()->with('translations');
        });
    }
    
    public function ClearCached(){
        Cache::forget('categories');
    }
    
}
