<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Message;
Use Redirect;
use App\Events\messageReceived;

class MessageController extends Controller
{
    //###############################################################
    //Function Name: sendMessage
    //Author:        Senil Shah <senil@creolestudios.com>
    //Purpose:       to send message and notify user through broadcast
    //In Params:     message
    //Return:        json
    //Date:          11th Apr, 2019
    //###############################################################
    public function sendMessage(Request $request){     
        try {
            $Input = Input::all();
            $userId = Auth::user()->id;
            $otherParty = $userId==1?2:1;
            \DB::beginTransaction();
                $messageData = new Message;
                $messageData->from_id = Auth::user()->id;
                $messageData->to_id = 2;
                $messageData->message = $Input['message'];
                $messageData->save();
                $messages = Message::whereIn('from_id',[$userId,$otherParty])->get();
                event(new messageReceived($Input['message']));
            \DB::commit();
                // return view('home', ['messages' => $messages,'authUser'=>Auth::user()->id]);
                return Redirect::back();
        } catch (\Exception $e) {
            \DB::rollback();
            print_r($e->getMessage()); die;
        }            
        return response($returnData);
    }
}
