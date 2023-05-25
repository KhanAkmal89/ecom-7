<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use File;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add');
    }

    public function manageCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.manage', compact('categories'));
    }

    public function storeCategory(CategoryStoreRequest $request)
    {
        $imageName = time().'.'. $request->image->extension();
        $request->image->move('category/',$imageName);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->image = $imageName;
        $category->save();
        return redirect('/category/manage')->with('success', 'Category has been created');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
        
    }

    public function updateCategory(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);

        if($request->hasFile('editimage')){
            if($category->image && file_exists(public_path('/category/'.$category->image))){
                unlink(public_path('/category/'.$category->image));
            }

            $imageUpdateName = time().'.'. $request->editimage->extension();
            $request->editimage->move('category/',$imageUpdateName);
            $category->image = $imageUpdateName;
        }
        
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->save();
        return redirect('/category/manage')->with('success', 'Category has been updated');
    }

    public function deleteCategory($id)
    {
        $categoryDelete = Category::find($id);
        File::delete(public_path('/category/'.$categoryDelete->image));
        $categoryDelete->delete();
        return redirect('/category/manage')->with('success', 'Category has been deleted');
    }
}