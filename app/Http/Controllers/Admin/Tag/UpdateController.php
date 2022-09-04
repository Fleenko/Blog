<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Admin\Tag\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        if(!Tag::where('title', $data['title'])->get()->count()){
            $tag->update($data); 
        }
        
        return redirect()->route('admin.tag.index');
    }
}
