<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\Posts\PostsServiceInterface;
use App\Traits\Util;

class SiteController extends Controller
{
    use Util;

    /**
     * @var PostsServiceInterface
     */
    protected $viewPath = "Site.";
    protected $PostsServiceInterface;

    public function __construct(PostsServiceInterface $PostsServiceInterface)
    {
        $this->PostsServiceInterface = $PostsServiceInterface;
    }

    public function index()
    {
        $posts = $this->PostsServiceInterface->ListaPosts();

        return view($this->viewPath.'index', compact('posts'));
    }
}
