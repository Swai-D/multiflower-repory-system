<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DirectMessage;
use DB;


class DirectMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $conversation = DB::table('direct_messages')->where('senderId', auth()->id())->orWhere('receiver_id', auth()->id())->get();
        // dd($conversation);
        $users = $conversation->map(function($conversation){

          if ($conversation->senderId === auth()->id()) {

            return $conversation;

          }

            return $conversation;

        })->unique();

        dd($users);
        $newConversation = User::where('id', '!=', $conversation->senderId)->orWhere('id', '!=', $conversation->receiver_id)->get();
        return view('DirectMessageBladeFiles.contacts-list', compact('users', 'newConversation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user_id)
    {
        $receiver = User::where('id', $user_id->id)->get();
        return view('DirectMessageBladeFiles.start-chat', compact('receiver'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = request()->validate([
         'senderId' => ['required', 'string'],
         'senderName' => ['required', 'string'],
         'senderImage' => ['required', 'string'],
         'receiver_id' => ['required', 'string'],
         'receiverName' => ['required', 'string'],
         'receiverImage' => ['required', 'string'],
         'text' => ['required', 'string'],
       ]);



       if (isset($data)) {
         DirectMessage::create($data);
         return redirect('/Multiflower-Report-System/direct-message-home-page');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(DirectMessage $direct_messages)
    {
        // dd("Nipo");
        $conversation = DB::table('direct_messages')->where('senderId', auth()->id())->orWhere('receiver_id', auth()->id())->get();
        // dd($conversation);
        $users = $conversation->map(function($conversation){

          if ($conversation->senderId === auth()->id()) {

            return $conversation;

          }

            return $conversation;

        })->unique();


        return view('DirectMessageBladeFiles.show-sms', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
