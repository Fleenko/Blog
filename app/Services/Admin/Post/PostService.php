<?php

namespace App\Services\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService extends Controller
{
    public function store($data)
    {
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        try {
            DB::beginTransaction();
            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            }
            $post = Post::create($data);
            if (isset($tags)) {
                $post->tags()->attach($tags);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
                $post->tags()->sync($tags);
            }
            $post->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
