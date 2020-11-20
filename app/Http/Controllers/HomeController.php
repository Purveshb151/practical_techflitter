<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('home',compact('users'));
    }

    public function userarray()
    {
        $response = [];
        $users = User::all();
        foreach ($users as $n) {
                $sub   = [];
                $id    = $n->id;
                $sub[] = $id;
                $sub[] = $n->name;
                $sub[] = $n->email;
                $sub[] = "<a id='".$n->id."' class='viewmore' data-detail='".base64_encode(json_encode($n))."'>View</a>";
                $response[] = $sub;
            }
            $userjson = json_encode(["data" => $response]);
            echo $userjson;
        // return view('home',compact('users'));
    }


}
