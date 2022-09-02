<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        if(!Category::where('title', $data['title'])->get()->count()){
            $category->update($data); 
        }
        
        return redirect()->route('admin.category.show', compact('category'));
    }
}
