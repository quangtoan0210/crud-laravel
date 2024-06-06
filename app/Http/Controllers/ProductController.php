<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\select;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with('category')->latest('id')->paginate(5);
        return view('products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->pluck('name', 'id')->all();
        return view('products.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        Product::query()->create($data);
        return redirect()->route('products.index')->with('success','thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::query()->pluck('name', 'id')->all();
        return view('products.edit', compact('category', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('img_thumb');
        if ($request->hasFile('img_thumb')) {
            $pathFile = Storage::putFile('products', $request->file('img_thumb'));
            $data['img_thumb'] = 'storage/' . $pathFile;
        }
        $currentImgThumb = $product->img_thumb;
        $product->update($data);
        if ($request->hasFile('img_thumb') && $currentImgThumb && file_exists(public_path($currentImgThumb))) {
            unlink(public_path($currentImgThumb));
        }
        return back()->with('success','thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if($product->img_thumb && file_exists(public_path($product->img_thumb))){
            unlink(public_path($product->img_thumb));
        }
        return redirect()->route('products.index')->with('success','thao tác thành công');
    }
}
