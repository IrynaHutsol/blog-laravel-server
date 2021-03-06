<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Created post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ( !empty( $request['content']) ) {
            if (Auth::check()) {
                $user = Auth::user()->id;
                $post = new Post([
                    'user_id' =>  $user,
                    'content' => $request['content']
                ]);
                $post->save();
            }
            
            return response()->json([
                'status' => 'OK'
            ]);
        }

        return response()->json([
            'status' => 'Error'
        ]);
    }
}