<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Admin\Models\Post;
use Modules\Admin\Models\Page;
use Modules\Admin\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $featuredPosts   =   Post::where('featured', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $featuredPosts = $this->slicePosts($featuredPosts, 2);
        
        $recentPosts     =   Post::whereNotIn('id', $featuredPosts->pluck('id'))->orderBy('created_at', 'desc')->take(5)->get();
        $allPosts        =   Post::whereNotIn('id', $recentPosts->pluck('id')->merge($featuredPosts->pluck('id')))->orderBy('created_at', 'desc')->get();

        $categories = Category::orderBy('created_at', 'desc')->take(4)->get();

        return view('frontend::index')->with([
            'posts' => $this->slicePosts($allPosts, 3),
            'featuredPosts' => $featuredPosts,
            'recentPosts' => $recentPosts,
            'categories' => $categories
        ]);
    }

    public function post(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend::post')->with(['post' => $post]);
    }

    public function page(Request $request, string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend::page')->with(['page' => $page]);
    }

    public function categories(Request $request)
    {
        $categories = Category::all();
        return view('frontend::categories')->with(['categories' => $categories]);
    }

    public function category(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $recentPosts     =   Post::where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $allPosts        =   Post::whereNotIn('id', $recentPosts->pluck('id'))
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = Category::where('id', '!=', $category->id)
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        return view('frontend::category')->with([
            'posts' => $allPosts,
            'recentPosts' => $recentPosts,
            'category' => $category,
            'categories' => $categories
        ]);

        return view('frontend::category');
    }

    public function slicePosts(Collection $posts, int $factor)
    {
        $modulus = $posts->count() % $factor;
        
        if($modulus != 0){
            $posts = $posts->slice(0, -$modulus);
        }

        return $posts;
    }

    public function assets(Request $request)
    {
        $path = str_start(str_replace(['../', './'], '', urldecode($request->path)), '/');
        //$path = base_path('vendor/glenwell/frontend-module/src/Resources/assets'.$path);
        $path = base_path('Modules/Frontend/src/Resources/assets'.$path);
        if (File::exists($path)) {
            $mime = '';
            if (ends_with($path, '.js')) {
                $mime = 'text/javascript';
            } elseif (ends_with($path, '.css')) {
                $mime = 'text/css';
            } else {
                $mime = File::mimeType($path);
            }
            $response = response(File::get($path), 200, ['Content-Type' => $mime]);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));
            return $response;
        }
        return response('', 404);
    }
}
