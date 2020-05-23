<?php

namespace App\Services\Posts;

use App\Interfaces\Posts\PostsRepositoryInterface;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Models\PostsModel;
use App\Validates\Posts\PostsValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Exception;

class PostsService implements PostsServiceInterface
{
    protected $PostsValidate;
    protected $PostsRepositoryInterface;

    public function __construct(PostsRepositoryInterface $PostsRepositoryInterface,
                                PostsValidate $PostsValidate)
    {
        $this->PostsRepositoryInterface = $PostsRepositoryInterface;
        $this->PostsValidate = $PostsValidate;
    }

    /**
     * @return Collection
     */
    public function listPosts(): Collection
    {
        return $this->PostsRepositoryInterface->listPosts();
    }

    /**
     * @return Collection
     */
    public function ListaPosts() : Collection
    {
        return $this->PostsRepositoryInterface->ListaPosts();
    }

    /**
     * @param stdClass $params
     * @return PostsModel
     * @throws Exception
     */
    public function createPosts(stdClass $params): PostsModel
    {
        $this->getPostsValidate()->validaParametros($params);

        return $this->PostsRepositoryInterface->createPosts($params);
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function getPost(PostsModel $post): PostsModel
    {
        return $this->PostsRepositoryInterface->getPost($post);
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function activePost(PostsModel $post) : PostsModel
    {
        return $this->PostsRepositoryInterface->activePost($post);
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function inactivePost(PostsModel $post) : PostsModel
    {
        return $this->PostsRepositoryInterface->inactivePost($post);
    }

    /**
     * @param PostsModel $post
     * @param stdClass $params
     * @return PostsModel
     * @throws Exception
     */
    public function updatePost(PostsModel $post, stdClass $params): PostsModel
    {
        $this->getPostsValidate()->validaParametros($params);

        return $this->PostsRepositoryInterface->updatePost($post, $params);
    }

    /**
     * @param PostsModel $post
     * @return PostsModel
     */
    public function deletePost(PostsModel $post): PostsModel
    {
        return $this->PostsRepositoryInterface->deletePost($post);
    }

    public function getPostsValidate() : PostsValidate
    {
        return $this->PostsValidate;
    }
}
