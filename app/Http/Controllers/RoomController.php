<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        return view('index', [
            'rooms' => Room::all()
        ]);
    }

    public  function show($id){
        $room = Room::find($id);
        $room["devices"] = $room->devices;

        return $room;
    }
}
