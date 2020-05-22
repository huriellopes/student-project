<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Interfaces\Users\UsersServiceInterface;
use Illuminate\Http\Request;
use Exception;

class AdminController extends Controller
{
    protected $PostsServiceInterface;
    protected $UsersServiceInterface;

    /**
     * HomeController constructor.
     * @param PostsServiceInterface $PostsServiceInterface
     * @param UsersServiceInterface $UsersServiceInterface
     */
    public function __construct(PostsServiceInterface $PostsServiceInterface, UsersServiceInterface $UsersServiceInterface)
    {
        $this->PostsServiceInterface = $PostsServiceInterface;
        $this->UsersServiceInterface = $UsersServiceInterface;
        $this->middleware('auth');
    }

    public function listPosts()
    {
        try {
            $posts = $this->PostsServiceInterface->listPosts();

            return response()->json($posts, 200);
        } catch (Exception $err) {
            throw new Exception('Erro ao listar', 400);
        }
    }
}
