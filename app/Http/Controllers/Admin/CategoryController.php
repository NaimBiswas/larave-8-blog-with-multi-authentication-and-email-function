<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:categories,name',
            'images' => 'required',
        ]);


        if ($request->hasfile('images')) {

            $image = $request->file('images');
            $fileName = time() . '.' . $request->images->extension();
            $image->move(public_path('storage/category/images'), $fileName);
            $save = new Category();
            $save->name = $request->name;
            $save->slug = Str::slug($request->name);
            $save->images = $fileName;
            $save->save();
        }


        return back()->with('success', 'Category Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find(base64_decode($id));
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',

        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '.' . $request->images->extension();
            $image->move(public_path('storage/category/images'), $fileName);

            $image_path = "storage/category/images/$category->images";  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $category->images = $fileName;
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('admin.category.index')->with('success', ' Category Updated Success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            $image_path = "storage/category/images/$category->images";  // Value is not URL but directory file path
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $category->delete();
        }

        return redirect()->back()->with('success', 'Category Deleted Success');
    }
}
