<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index():ResourceCollection|Response|JsonResponse
    {
        try {
            $posts = Post::with('category')->paginate(10);
            if (count($posts) <= 0) return response('Not Posts', 200);
            else return PostResource::collection($posts = Post::with('category')->paginate(10));
        }catch (\Exception $exception){
            return response('The connection was not established because the destination computer rejected the connection request', 502);
        }
    }

    public function store(PostRequest $postRequest):PostResource|Response
    {
        try {
            $postRequest = $postRequest->validated();
            $post = Post::where('title', $postRequest['title'])->first();
            if ($post) return new PostResource($post);
//            if ($post) return response('Post with the same name already exists', 200);
            else return new PostResource($post = Post::create($postRequest)->load('category'));
        }catch (\Exception $exception){
            return response($exception->getMessage(), $exception->getCode());
        }
    }

    public function show(Post $post):PostResource
    {
        return new PostResource($post->load('category'));
    }

    public function edit(PostRequest $postRequest, Post $post):PostResource|Response
    {
        try {
            $postRequest = $postRequest->validated();
            return new PostResource($post->updateOrCreate(['id' => $post->id],[...$postRequest]));
        }catch (\Exception $exception){
            return response($exception->getMessage(), $exception->getCode());
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }
}
