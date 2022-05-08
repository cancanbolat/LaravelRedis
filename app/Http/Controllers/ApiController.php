<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class ApiController extends Controller
{
    public function Test($id)
    { 
        /* return Cache::get('posts', function(){
            return Post::all();
        }); */

        //2 dakka cache'de tutacak
        /* return Cache::remember('posts', 120, function () {
            return Post::all();
        }); */

        //dd(Cache::has('posts')); //cache kontrolü

        //$posts = Post::all();
        $post = Post::whereId($id)->first();

        if (Cache::has('posts')) {
            return Cache::get('posts');
        }
        Cache::put('posts', $post, now()->addMinutes(5));
        return $post;   
        
    }

    public function redis(){
        Redis::set('fullName', 'can canbolat');
        Redis::getset('user_id', 1907);
        
        //dd(Redis::get('fullName'));
        //dd(Redis::keys('*'));

        //Redis::set('mersin:2021:04:20:ziyaretci', '75');
        //Redis::set('mersin:2021:04:20:bayan', '15');
        //Redis::set('mersin:2021:04:20:bay', '25');
        //Redis::set('mersin:2021:04:20:cocuk', '35');

        $keys = Redis::keys('mersin:*');
        //dd($keys);

        foreach ($keys as $key) 
        {
            return Redis::get($key);
        }

    }
}
