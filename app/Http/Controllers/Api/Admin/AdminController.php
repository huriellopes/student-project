<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Interfaces\Users\UsersServiceInterface;
use App\Models\PostsModel;
use App\Traits\Util;
use Illuminate\Http\Request;
use Exception;
use stdClass;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $PostsServiceInterface;
    protected $UsersServiceInterface;

    use Util;

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

    public function newPost(Request $request)
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->title = $this->limpa_tags($request->input('title'));
                $params->description = $this->limpa_tags($request->input('description'));
                $params->content = $this->limpa_tags($request->input('content'));

                $this->PostsServiceInterface->createPosts($params);
            DB::commit();

            return response()->json([
                'message' => 'Post cadastrado com Sucesso!'
            ], 201);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'message' => 'Deu algum erro!'
            ], 400);
        }
    }

    public function updatePost(PostsModel $PostsModel, Request $request)
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->title = $this->limpa_tags($request->input('title'));
                $params->description = $this->limpa_tags($request->input('description'));
                $params->content = $this->limpa_tags($request->input('content'));

                $this->PostsServiceInterface->updatePost($PostsModel, $params);
            DB::commit();

            return response()->json([
                'message' => 'Post atualizado com Sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'message' => 'Deu algum erro!'
            ], 400);
        }
    }

    public function ativaPosts(PostsModel $PostsModel)
    {
        try {
            DB::beginTransaction();
                $this->PostsServiceInterface->activePost($PostsModel);
            DB::commit();

            return response()->json([
                'message' => 'Post ativado com Sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'message' => 'Deu algum erro!'
            ], 400);
        }
    }

    public function inativaPosts(PostsModel $PostsModel)
    {
        try {
            DB::beginTransaction();
                $this->PostsServiceInterface->inactivePost($PostsModel);
            DB::commit();

            return response()->json([
                'message' => 'Post inativado com Sucesso!'
            ], 200);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json([
                'message' => 'Deu algum erro!'
            ], 400);
        }
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

    public function listUsers()
    {
        try {
            $users = $this->UsersServiceInterface->listUsers();

            return response()->json($users, 200);
        } catch (Exception $err) {
            throw new Exception('Erro ao listar', 400);
        }
    }
}
