<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Room;

class OwnerController extends Controller
{
    public function CreateRooms(Request $request)
    {
        foreach ($request->data as $key)
        {
            DB::table('rooms')->insert([
                'ownerID' => $key['ownerID'],
                'roomName' => $key['roomName'],
                'area' => $key['area'],
                'price' => $key['price'],
                'totalRoom' => $key['totalRoom'],
                'availableRoom' => $key['availableRoom'],
                'address' => $key['address'],
                'city' => $key['city']
                ]);
        }

        return Response()->json(['message' => 'succesfully.', 'status' => 201]);
    }

    public function UpdateRoom(Request $request)
    {
        Room::where('id',$request->roomID)->update(
            [
                'roomName' => $request->roomNmae,
                'area' => $request->area,
                'price' => $request->area,
                'totalRoom' => $request->totalRoom,
                'availableRoom' => $request->availableRoom,
                'address' => $request->address,
                'city' => $request->city        
            ]);

        return Response()->json(['message' => 'succesfully.', 'status' => 200]);
    }

    public function GetAllRoom()
    {
        $rooms = Room::all();
        
        return Response()->json(['data' => $rooms,'status' => 200]);
    }

    public function GetRoomBySorting($sort)
    {
        if ($sort != "price" || $sort != "available") {
            return Response()->json(['data' => 'Unknown sorting field!','status' => 200]);
        }

        $rooms = DB::table('rooms')
                ->select('*')
                ->orderBy($sort)
                ->get();
        
        return Response()->json(['data' => $rooms,'status' => 200]);
    }

    public function GetRoomBySearchType(Request $request)
    {
        if ($request->type == "roomName") {
            $rooms = DB::table('rooms')
                ->where('roomName', 'like', '%'. $request->keyword . '%')
                ->select('*')
                ->get();
            
            return Response()->json(['data' => $rooms,'status' => 200]);
        }
        else if ($request->type == "city") {
            $rooms = DB::table('rooms')
                ->where('city', 'like', '%'. $request->keyword . '%')
                ->select('*')
                ->get();

            return Response()->json(['data' => $rooms,'status' => 200]);
        } 
        else if ($request->type == "price") {
            $rooms = DB::table('rooms')
                ->where('price', $request->keyword)
                ->select('*')
                ->get();

            return Response()->json(['data' => $rooms,'status' => 200]);
        } else {
            return Response()->json(['data' => 'Unknown search type!' ,'status' => 204]);
        }
    }

    public function GetRoomDetail($id)
    {
        $room = Room::find($id);

        if ($room == null) {
            return Response()->json(['data' => 'Room not found!','status' => 204]);
        }
        
        return Response()->json(['data' => $room,'status' => 200]);
    }

    public function deleteRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return Response()->json(['data' => 'Successfully','status' => 200]);
    }
}