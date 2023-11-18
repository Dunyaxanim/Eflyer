<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use InterfaceProduct;

class ProductController extends Controller
{
    public function __construct(protected ProductService $service)
    {
    }
    public function index()
    {
        $products = $this->service->dataAllWithPaginate();
        return view('admin.pages.Product.index', ['model' => $products]);
    }
    public function create()
    {
        $categories = Category::get();
        return view('admin.pages.Product.form', ['categories'=> $categories]);
    }
    public function store(ProductRequest $request)
    {
        $this->service->store($request);
        return Redirect::back()->with(["message" => "Product is added successfully! "]);
    }
    public function show(Product $data)
    {
        $categories = Category::get();
        return view('admin.pages.Product.form',['model'=> $data,'categories'=> $categories]);
    }
}
