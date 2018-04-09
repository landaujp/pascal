<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RoomCreateRequest;
use App\Http\Responses\SuccessResponse;
use App\Models\Room;

class RoomController extends Controller
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
        $rooms = Room::all();

        return new SuccessResponse($rooms);
    }

    /**
     * チャットルーム作成.
     *
     * @return \Illuminate\View\View
     */
    public function create(RoomCreateRequest $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->save();

        return new SuccessResponse($room);
    }

}
