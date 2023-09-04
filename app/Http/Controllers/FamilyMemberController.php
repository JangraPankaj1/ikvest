<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Exception;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;
use DataTables;
use DateTime;

class FamilyMemberController extends Controller
{


    public function dashboard()
    {
        return view('family-member.dashboard');
    }

    public function profileUpdate()
    {
        return view('family-member.profile');
    }

    // *********profile update*******
   public function profileUpdatePost(Request $request){

    $validatedData = $request->validate([
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
       ]);

    if ($request->hasFile('image')) {

       $profileName = $request->file('image')->getClientOriginalName();
       $request->file('image')->move(public_path('images'), $profileName);
       $email = auth()->user()->email;

       $User = User::find(Auth::user()->id);
       $User->f_name = $request->input('f_name');
       $User->l_name = $request->input('l_name');
       $User->bdy_date = $request->input('bdy_date');
       $User->mrg_date = $request->input('mrg_date');


       $User->email = $email;
       $User->profile_pic = $profileName;
       $User->image_path = 'images/' . $profileName;
       $User->update();
       return back()->with('message','Profile Updated');


    }else{

        $email = auth()->user()->email;
        $User = User::find(Auth::user()->id);
        $User->f_name = $request->input('f_name');
        $User->l_name = $request->input('l_name');
        $User->email =  $email;
        $User->bdy_date = $request->input('bdy_date');
        $User->mrg_date = $request->input('mrg_date');
        $User->update();
        return back()->with('message','Profile Updated');

    }

 }

         // ********** Show Comments on timeline **********

   public function postComment($id)
    {

         // Find the post by ID
        $post = Post::findOrFail($id);
        // Get the user who posted this post
        $user = $post->user;

        return view('family-member/post-show-comment', compact('post','user'));
    }

             // ********** Delete Comment **********

    public function deleteComment($id, Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $comment->delete();
        return back()->with('message','Comment Deleted');

    }

         // ********** Post Comments **********

    public function CommentOnPost(Request $request, $id)
     {
        $validatedData = $request->validate([
            'content' => 'required',
           ]);


        $post = Post::findOrFail($id);
        $post->comments()->create([
            'comment' => $request->content,
            'user_id' => auth()->id()
        ]);

        return back()->with('message','Comment posted successfully');
      }

     // **********ShowTimeline**********

     public function showTimeline(Request $request)
      {

        try{

            $data = Post::join('users', 'posts.posted_by', '=', 'users.id')->orderBy('posts.created_at', 'desc')
            ->get(['posts.*', 'users.f_name']);
            return view('family-member/timeline', compact('data'));

       }catch (Exception $e) {
               dd($e->getMessage());
               return back()->withErrors($e->getMessage());

       }

     }


 // ********** Delete Timeline **********
 public function deleteTimeline($id)
 {
     $student = Post::findOrFail($id);
     $student->delete();
     return back()->with('message','Timeline Deleted');
 }


}
