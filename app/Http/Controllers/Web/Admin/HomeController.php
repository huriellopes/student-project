<?php


namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Interfaces\Users\UsersServiceInterface;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $viewPath = "Admin.";
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view($this->viewPath.'home');
    }

    public function users()
    {
        return view($this->viewPath.'pages.users.index');
    }

    public function posts()
    {
        return view($this->viewPath.'pages.posts.index', compact('posts'));
    }

    public function postCreate(Request $request)
    {
        return view($this->viewPath.'pages.posts.create');
    }

    public function showPost(PostsModel $PostsModel)
    {
        $post = $this->PostsServiceInterface->getPost($PostsModel);

        return View($this->viewPath.'pages.posts.show', compact('post'));
    }
}
