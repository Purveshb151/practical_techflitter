<?php

namespace App\Http\Controllers;

use App\Models\MailPractical;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class MailPracticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inboxs = MailPractical::where('receiver_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('mailpractical.inbox',compact('inboxs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('mailpractical.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $mailPractical = new MailPractical;
        $mailPractical->sender_id = Auth::user()->id;
        $mailPractical->receiver_id = request('user_id');
        $mailPractical->subject = request('subject');
        $mailPractical->message = request('message');
        $mailPractical->save();
        return redirect()->route('compose.inbox')->with("success","Compose added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailPractical  $mailPractical
     * @return \Illuminate\Http\Response
     */
    public function show(MailPractical $mailPractical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailPractical  $mailPractical
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $mailPractical = MailPractical::find($id);
        MailPractical::where('id',$id)->update(['read'=>1]);
        return view('mailpractical.reply',['reply'=>$mailPractical]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailPractical  $mailPractical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $mailPractical = new MailPractical;
        $mailPractical->sender_id = Auth::user()->id;
        $mailPractical->receiver_id = request('user_id');
        $mailPractical->subject = request('subject');
        $mailPractical->message = request('message');
        $mailPractical->save();
        return redirect()->route('compose.inbox')->with("success","Reply added successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailPractical  $mailPractical
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailPractical $mailPractical)
    {
        //
    }


    public function sent()
    {
        $sents = MailPractical::where('sender_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('mailpractical.sent',compact('sents'));
    }


    public function readorunread(Request $request)
    {

        $inboxs = MailPractical::where('id',$request->id)->first();
        if($inboxs){
            if($inboxs->read == 0){
                MailPractical::where('id',$request->id)->update(['read'=>1]);
                return 1;
            }else{
                MailPractical::where('id',$request->id)->update(['read'=>0]);
                return 0;
            }
        }
        return 0;
    }

}
