<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CategoryCreateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {
        
    } 
    public function index()
    {
        $model = $this->service->getAllData();
        return view('admin.pages.Category.categoryList',['model'=>$model]);
    }
    public function create()
    {
        return view('admin.pages.Category.categoryCreate');
    }
    public function store(CategoryCreateRequest $request)
    {
        $request = $request->validated();
        try {
            DB::beginTransaction();
            Category::create($request);
            DB::commit();
            // self::ClearCached();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return Redirect::back()->with(["message" => "Category is added successfully! "]);
    }
    public function show(Category $data)
    {
        return view('admin.pages.Category.categoryShow',['model'=> $data]);
    }
    public function update(CategoryCreateRequest $request, Category $data)
    {
        $this->service->update($request, $data);
        return Redirect::back()->with(["message" => "Category is updated successfully! "]);
    }
    public function destroy(Category $data)
    {
        $this->service->destroy($data);
        return Redirect::back()->with(["message" => "Category is deleted successfully! "]);
    }

    public function destroyAll(){
        $this->service->destroyAll();
        return Redirect::back()->with(["message" => "All Categories are deleted successfully! "]);
    }
}
