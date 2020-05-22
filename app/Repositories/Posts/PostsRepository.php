<?php

namespace App\Repositories\Posts;

use App\Interfaces\Posts\PostsRepositoryInterface;
use App\Models\PostsModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;

class PostsRepository implements PostsRepositoryInterface
{

    /**
     * @return Collection
     */
    public function listPosts(): Collection
    {
        return PostsModel::all();
    }

    /**
     * @param stdClass $params
     * @return PostsModel
     */
    public function createPosts(stdClass $params): PostsModel
    {
        $posts = new PostsModel();
        $posts->title = $params->title;
        $posts->description = $params->description;
        $posts->content = $params->content;
        $posts->active = $params->active;
        $posts->user_id = Auth::user()->id;
        $posts->save();

        return $posts;
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function getPost(PostsModel $post): PostsModel
    {
        return PostsModel::with('author')
            ->where('id', $post->id)
            ->first();
    }

    /**
     * @param PostsModel $post
     * @param stdClass $params
     * @return PostsModel
     */
    public function updatePost(PostsModel $post, stdClass $params): PostsModel
    {
        $Post = $this->getPost($post);

        $Post->fill([
            'title' => $params->title,
            'description' => $params->description,
            'content' => $params->content,
            'active' => $params->active,
        ]);

        $Post->save();

        $Post->refresh();

        return $Post;
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function deletePost(PostsModel $post): PostsModel
    {
        $post->delete();

        return $post;
    }
}
