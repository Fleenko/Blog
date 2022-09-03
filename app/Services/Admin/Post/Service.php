<?php

namespace App\Services\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Service extends Controller
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->attach($tags);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function update($data, $post){
        try{
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);
            $post->update($data);
            $post->tags()->sync($tags);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
}
