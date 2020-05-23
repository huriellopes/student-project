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
        return PostsModel::with('author')->get();
    }

    /**
     * @return Collection
     */
    public function ListaPosts() : Collection
    {
        return PostsModel::with('author')->where('active', 1)->get();
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
     * @return PostsModel
     */
    public function getposts(PostsModel $post): PostsModel
    {
        return PostsModel::where('id', $post->id)->first();
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function activePost(PostsModel $post) : PostsModel
    {
        $Post = $this->getposts($post);

        $Post->fill([
            'active' => 1
        ]);

        $Post->save();

        $Post->refresh();

        return $Post;
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function inactivePost(PostsModel $post) : PostsModel
    {
        $Post = $this->getposts($post);

        $Post->fill([
            'active' => 0
        ]);

        $Post->save();

        $Post->refresh();

        return $Post;
    }

    /**
     * @param PostsModel $post
     * @param stdClass $params
     * @return PostsModel
     */
    public function updatePost(PostsModel $post, stdClass $params): PostsModel
    {
        $Post = $this->getposts($post);

        $Post->fill([
            'title' => $params->title,
            'description' => $params->description,
            'content' => $params->content
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
