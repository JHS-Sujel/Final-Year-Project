<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $messages = Message::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/messages", 'name' => "Messages"]
        ];

        return view('/messages/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'messages' => $messages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        if ($message) {
            return response()->json($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $message = Message::find($id);
        $message->status = 1;
        $message->save();

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/messages", 'name' => "Messages"],
            ['link' => "#", 'name' => "View"]
        ];

        return view('/messages/show', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'message' => $message,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
