<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Admin_categoryController extends Controller
{
    public function category_list()
    {
        $data['category'] = Category::all();
        $data['language'] = App::getLocale();
        return view('admin.kategory.index', $data);
    }

    public function create_category()
    {
        return view('admin.kategory.create');
    }

    public function create(CategoryRequest $request)
    {
        if (!empty($request->en_desc)||!empty($request->arm_desc)||!empty($request->ru_desc) ) {
            if (count(str_split($request->en_desc)) < 10 && count(str_split($request->ru_desc)) < 10 && count(str_split($request->arm_desc)) < 10) {
                return redirect()->back()->withErrors(['error' => 'The desc must be at least 10 characters.']);
            }
        }
        Category::create([
            'en_name' => $request->en_name,
            'ru_name' => $request->ru_name,
            'arm_name' => $request->arm_name,
            'en_title' => $request->en_title,
            'ru_title' => $request->ru_title,
            'arm_title' => $request->arm_title,
            'en_description' => $request->en_desc,
            'ru_description' => $request->ru_desc,
            'arm_description' => $request->arm_desc,
        ]);
        return redirect()->back()->with('success', 'Category created successful ');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->id);
        echo 'success';
    }

    public function edit($id)
    {
        $data['category'] = Category::where('id', $id)->first();

        return view('admin.kategory.edit', $data);
    }

    public function edit_cat(CategoryRequest $request)
    {
        if (!empty($request->en_desc)||!empty($request->arm_desc)||!empty($request->ru_desc) ) {
            if (count(str_split($request->en_desc)) < 10 && count(str_split($request->ru_desc)) < 10 && count(str_split($request->arm_desc)) < 10) {
                return redirect()->back()->withErrors(['error' => 'The desc must be at least 10 characters.']);
            }
        }
        $category = Category::find($request->id);
        $category->en_name = $request->en_name;
        $category->ru_name = $request->ru_name;
        $category->arm_name = $request->arm_name;
        $category->en_title = $request->en_title;
        $category->ru_title = $request->ru_title;
        $category->arm_title = $request->arm_title;
        $category->en_description = $request->en_desc;
        $category->ru_description = $request->ru_desc;
        $category->arm_description = $request->arm_desc;
        $category->save();
        return redirect()->back()->with('success', 'Category updated successful ');
    }
}
