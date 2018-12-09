<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use DB;

class MessageController extends Controller
{
    public function index(){
        $userId = auth()->id();
        return Message::select(
            'id', 
            DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as written_by_me"),
            'created_at',
            'content')->get();
    }

    public function store(Request $request){
        $message = new Message();
        $message->from_id = auth()->id() ;
        $message->to_id = $request->to_id;
        $message->content = $request->content;
        //este metodo devuelve un valor booleano al momento de guardar la consulta
        $saved = $message->save();
        $data = [];
        $data['success'] = $saved;
        return $data;

    }
}
