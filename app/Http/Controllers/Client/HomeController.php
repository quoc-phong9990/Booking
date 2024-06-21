<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseJson;
use App\Models\Post;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public $response;
    public function __construct(ResponseJson $response)
    {
        $this->response = $response;
    }
    public function newTours()
    {
        $tours = Tour::where('is_active', 1)->orderByDesc('created_at')->take(8)->get();
        foreach ($tours as $tour) {
            $tour->type = $tour->type()->value('name_type');
            $tour->rates = [
                'rate' => number_format($tour->rates()->avg('rate'), 1),
                'qty' => $tour->rates()->count()
            ];
            //Ảnh của tour
            $tour->images = $tour->images()->value('image');
            //Địa điểm tour
            $tour->location = [
                'province' => $tour->province()->value('name'),
                'district' => $tour->district()->value('name'),
                'ward' => $tour->ward()->value('name')
            ];
        }
        if ($tours) {
            return $this->response->responseSuccess($tours);
        }
        return $this->response->responseFailed();
    }
    public function featureTours()
    {
        $tours = Tour::where('is_active', 1)->orderByDesc('views')->take(8)->get();
        foreach ($tours as $tour) {
            $tour->type = $tour->type()->value('name_type');
            $tour->rates = [
                'rate' => number_format($tour->rates()->avg('rate'), 1),
                'qty' => $tour->rates()->count()
            ];
            //Ảnh của tour
            $tour->images = $tour->images()->value('image');
            //Địa điểm tour
            $tour->location = [
                'province' => $tour->province()->value('name'),
                'district' => $tour->district()->value('name'),
                'ward' => $tour->ward()->value('name')
            ];
        }
        if ($tours) {
            return $this->response->responseSuccess($tours);
        }
        return $this->response->responseFailed();
    }
    public function newPosts()
    {
        $posts = Post::where('is_active', 1)->orderByDesc('created_at')->take(8)->get();
        foreach ($posts as $post) {
            $post->comments = $post->comments()->count('comment');
        }
        if ($posts) {
            return $this->response->responseSuccess($posts);
        }
        return $this->response->responseFailed();
    }
}
