<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class UserController extends Controller
{
    public function checkRoom(Request $request)
    {
        $userData = User::find($request->userID);

        if ($userData->credit == 0) {
            return response()->json(['message' => 'You spend all your credit this month!', 'status' => 204]);
        }

        $roomData = Room::find($request->roomID);

        if ($roomData == null) {
            return response()->json(['message' => 'Unknown room!', 'status' => 204]);
        }
        
        User::where('id',$userID)->update(['credit' => $userData->credit - 5]);
        
        if ($roomData->availableRoom > 0) {
            return response()->json(['message' => 'Room is available!', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Room is not available!', 'status' => 200]);
        }
    }
}
