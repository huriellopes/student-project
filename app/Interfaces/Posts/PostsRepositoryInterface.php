<?php

namespace App\Interfaces\Posts;

use App\Models\PostsModel;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface PostsRepositoryInterface
{
    /**
     * @return Collection
     */
    public function listPosts() : Collection;

    /**
     * @param stdClass $params
     * @return PostsModel
     */
    public function createPosts(stdClass $params) : PostsModel;

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function getPost(PostsModel $post) : PostsModel;

    /**
     * @param PostsModel $post
     * @param stdClass $params
     * @return PostsModel
     */
    public function updatePost(PostsModel $post, stdClass $params) : PostsModel;

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function deletePost(PostsModel $post) : PostsModel;
}
