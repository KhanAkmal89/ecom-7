<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.brand.add', compact('categories'));
    }

    public function storeBrand(BrandStoreRequest $request)
    {
       $data = [

        'category_id' => $request->category_id,
        'name' => $request->name,
       'slug' => str_replace(' ', '-', strtolower($request->name)),

       ];

       Brand::create($data);

       session()->flash('success', 'Brand has been added');
       return redirect()->back();
    }

    public function manageBrand()
    {
        $brands = Brand::with('category')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.brand.manage', compact('brands'));
    }

    public function editBrand($id)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $brand = Brand::with('category')->find($id);
        return view('admin.brand.edit', compact('categories', 'brand'));
    }

    public function updateBrand(BrandStoreRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->category_id = $request->category_id;
        $brand->name = $request->name;
        $brand->slug = str_replace(' ', '-', strtolower($request->name));
        $brand->save();
        session()->flash('success', 'Brand has been created');
       return redirect('/brand/manage');
    }

    public function deleteBrand($id)
    {
        $deleteBrand = Brand::find($id);
        $deleteBrand->delete();
        session()->flash('success', 'Brand has been deleted');
       return redirect('/brand/manage');
    }


}
