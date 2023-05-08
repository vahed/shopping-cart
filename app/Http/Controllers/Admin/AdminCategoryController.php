<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCategoryController extends Controller
{
    /**
     * for creating new category for admin purposes
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response|void
     */
    public function createNewCategory(Request $request)
    {
        $category = Category::getCategory();

        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric'
            ]);

            foreach( $category as $cat){
                if($cat->name == $request->name) {
                    return redirect()->back()->with('error', 'این دسته بندی در بانک دادها موجود است۰');
                }
            }

            Category::create([
                'name' => $request->name,
                'parent_id' =>$request->parentId
            ]);

            return redirect()->back()->with('success', 'دسته بندی به بانک دادها افزوده شد۰');
        }
    }
}
