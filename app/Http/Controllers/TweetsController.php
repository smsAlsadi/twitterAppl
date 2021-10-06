<?php

namespace App\Http\Controllers;
use App\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class TweetsController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
public function timeline(){
    $data['tweets']=Tweet::all();
    return view('tweets.timeline',$data);
}
public function createTweet(Request $request){
    // return $request;
    $tweet=new Tweet();
    $tweet->content=$request->text;
    $tweet->user_id=Auth::id();
    $tweet->save();
    return back();

}
// public function EditTweet(Request $request){
//      return view('tweets.timeline');
//     // if($request->isMethod(('post'))){
//     //     $tweet=Tweet::find($id);
//     //     $tweet->content=$request->text;
//     //     $tweet->user_id=Auth::id();
//     //     $tweet->save();
//     //     return redirect("tweets.timeline");

//     // }else
//     // $tweets=Tweet::find($id);
//     // $data=Array('tweetedit'=>$tweets);
//     //     return view('tweets.editTweet', $data);

//      }
    
}



