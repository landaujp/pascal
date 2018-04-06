<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentCreateRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * チャットルーム一覧取得.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rooms = Comment::all();

        return response()->json($rooms);
    }

    /**
     * チャットルーム作成.
     *
     * @return \Illuminate\View\View
     */
    public function create(CommentCreateRequest $request)
    {
        $comment = new Comment();
        $comment->room_id   = 1;
        $comment->user_name = 'ishino';
        $comment->comment   = $request->comment;
        $comment->save();

        return response()->json($comment);
    }

}
