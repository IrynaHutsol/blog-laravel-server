<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;

class CommentController extends Controller
{
     /**
     * Created comment
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ( !empty( $request['text']) ) {
            if (Auth::check()) {
                $user = Auth::user()->id;
                $comment = new Comment([
                    'user_id' =>  $user,
                    'post_id' =>  $request['post_id'],
                    'text' => $request['text'],
                    'date' => $request['date']
                ]);
                $comment->save();
            }
            
            return response()->json([
                'status' => 'OK'
            ]);
        }

        return response()->json([
            'status' => 'Error'
        ]);
    }

    /**
     * Display comments of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function getComments()
    {   
        return response()->json(Comment::all());
    }
}
