<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentCreateRequest;
use App\Http\Responses\SuccessResponse;
use App\Models\Comment;
use App\Models\Room;

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
    public function index($room_name)
    {
        $room     = Room::where('name', $room_name)->first();
        $comments = Comment::where('room_id', $room->id)->get();

        return new SuccessResponse($comments);
    }

    /**
     * チャットルーム作成.
     *
     * @return \Illuminate\View\View
     */
    public function create(CommentCreateRequest $request)
    {
        $room = Room::where('name', $request->room_name)->first();

        $comment = new Comment();
        $comment->room_id   = $room->id;
        $comment->user_name = $request->user_name;
        $comment->comment   = $request->comment;
        $comment->save();

        return new SuccessResponse($comment);
    }

}
