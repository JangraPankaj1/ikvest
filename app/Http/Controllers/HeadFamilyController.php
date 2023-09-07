<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Post;
use App\Models\Comment;


use DataTables;
use DateTime;
use Illuminate\Support\Facades\Crypt;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
use Exception;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Auth;


class HeadFamilyController extends Controller
{
    //
    public function dashboard()
    {

        return view('head-family.dashboard');
    }


    public function changePassword()
    {

        return view('head-family.change-password');
    }

    public function eventPage()
    {

        return view('head-family.add-event');
    }

    public function profileUpdate()
    {
        return view('head-family.profile');
    }

    public function addFamilyMember()
     {
        return view('head-family.add-family-member');
     }

     public function postPage()
     {
        return view('head-family.add-post');
     }

// random generate string tokens
     function generateRandomString($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string = '';

        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public function generateRandomToken()
    {
       return $this->generateRandomString(10); // Change the length as needed
    }



     // ********* Invite Family Member *******

     public function invitefamilyMember(Request $request)
       {

        try {

            $request->validate(
                [
                    'first_name'  => 'required|max:255',
                    'last_name' => 'required|max:255',
                    'email' => 'required|email|unique:users|max:255|ends_with:.com',
                    'role' => 'required',
                ]
            );

            if ($request['head_family_id'] !== null) {
                  $headFamilyId = $request->head_family_id ;
            }else{
                  $headFamilyId = Auth::user()->id;
            }

            $token = $this->generateRandomToken();
            $addedByHead = Auth::user()->id;

            $user = new User;
            $user->f_name     = $request->first_name;
            $user->l_name     = $request->last_name;
            $user->email      = $request->email;
            $user->role       = $request->role;

            $user->parent_id =  $addedByHead;
            $user->head_family_id  =  $headFamilyId;
            $user->remember_token  = $token;
            $user->save();

            $email = $request->email;

            $fName = $request->first_name;
            $lName = $request->last_name;
            $fullName = $fName.''.$lName;

            Mail::send('emails.invite_link', ['token' => $token, 'fullName' => $fullName], function ($message) use ($email) {

                $message->to($email);
                $message->subject('invite link');
            });

            return back()->with('message','Member Invite Successfully');

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect("head-family/dashboard")->withErrors($e->getMessage());
        }

    }

              // ********* get content Posts *******


        public function getPostContent($postId)
            {

            
                // $post = Post::with(['comments', 'user'])->find($postId);
                $post = Post::with(['comments.user'])->find($postId);


                  
                if ($post) {
                    return response()->json(['post' => $post ]);
                }

                // Handle the case where the post is not found
                return response()->json(['error' => 'Post not found'], 404);
            }


        // ********* Upload Posts *******

        public function uploadPost(Request $request)

            {
                try {

                    $request->validate(
                        [
                            'file' => 'image|mimes:jpg,png,jpeg,gif,svg|pdf,xml,csv,mp4|max:20480', // Max size in kilobytes (20MB)
                            'post' => 'required',
                        ]
                    );


                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    $imageData = [];

                    foreach ($images as $image) {

                        $imageName = $image->getClientOriginalName();
                        $image->move(public_path('images'), $imageName);

                        $imageData[] = [
                            'image_name' => $imageName,
                            'image_path' => 'images/' . $imageName,
                        ];
                    }

                   $post = new Post;
                   $post->posted_by  = Auth::user()->id;
                   $post->post_message  = $request->post;

                   $post->docs = json_encode(array_column($imageData, 'image_name'));
                   $post->docs_path = json_encode(array_column($imageData, 'image_path'));
                   $post->save();
                   $data = Post::join('users', 'posts.posted_by', '=', 'users.id')->orderBy('posts.created_at', 'desc')
               ->get(['posts.*', 'users.f_name']);

               return view('head-family/timeline', compact('data'));

                }else{

                    $post = new Post;
                    $post->posted_by  = Auth::user()->id;
                    $post->post_message  = $request->post;
                    $post->save();

                    $data = Post::join('users', 'posts.posted_by', '=', 'users.id')->orderBy('posts.created_at', 'desc')
                    ->get(['posts.*', 'users.f_name']);

                    return view('head-family/timeline', compact('data'));
                }
            }catch (Exception $e) {
                dd($e->getMessage());
                return back()->withErrors($e->getMessage());
            }
         }
    // ********* Show timeline *******

         public function showTimelineHead(Request $request)
          {

           try{

               $comments = DB::table('comments')
               ->join('posts', 'comments.post_id', '=', 'posts.id')
               ->select('comments.comment')
               ->get();

            $data = Post::join('users', 'posts.posted_by', '=', 'users.id')->orderBy('posts.created_at', 'desc')
            ->get(['posts.*', 'users.f_name','users.image_path']);


               return view('head-family/timeline', compact('data','comments'));

          }catch (Exception $e) {
                  dd($e->getMessage());
                  return back()->withErrors($e->getMessage());

          }

        }
           // ********* Add Comment*******
        public function CommentOnPostHead (Request $request, $id)
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

          // ********** Delete Post **********

          public function deletePost($id)
          {

             try {

                 $post = Post::findOrFail($id);
                 $post->delete();
                 
                 return back()->with('message','Post deleted successfully');

             } catch (\Exception $e) {
                 // Return an error JSON response
                 return back()->with('error','Post not deleted ');
             }
         }

                   // ********** Delete Comment jquery model **********

                   public function deleteComment($id, Comment $comment)
                    {
                       try {
                           $comment = Comment::findOrFail($comment->id);
                           $comment->delete();
                           
                           // Return a success JSON response
                           return response()->json(['message' => 'Comment deleted successfully'], 200);
                       } catch (\Exception $e) {
                           // Return an error JSON response
                           return response()->json(['error' => 'An error occurred while deleting the comment'], 500);
                       }
                   }
                   // ********** Delete Comment **********

                    public function commentDelete($id, Comment $comment)
                     {
                    
                        $comment = Comment::findOrFail($comment->id);

                        $comment->delete();

                        return back()->with('message','Comment Deleted');

                    }

    // ********* Add Event *******

    public function eventPagePost(Request $request)
      {

         try {

                $request->validate(
                    [
                        'event_name'  => 'required|max:255',
                        'description' => 'required|max:255',
                        'Date_time'    =>  'required',
                        'placeLocation'  => 'required',

                    ]
                );

                $datetime = new DateTime ($request->Date_time);
                $formattedDatetime = $datetime->format('Y-m-d H:i:s');

                $fname = Auth::user()->f_name;
                $lname = Auth::user()->l_name;
                $fullname = $fname.''.$lname;
                $event = new Event;
                $event->user_id  = Auth::user()->id;
                $event->event_created_by  = $fullname;
                $event->event_name  = $request->event_name;
                $event->description  = $request->description;
                $event->place    = $request->placeLocation;
                $event->date_time = $formattedDatetime;
                $event->save();

                return back()->with('message','Event Added Successfully');


       } catch (Exception $e) {
           dd($e->getMessage());
           return redirect("register")->withErrors($e->getMessage());
       }
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

 // **********allEvents**********
 public function allEvents(Request $request)
  {

     try{

        if ($request->ajax()) {

            $data = Event::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        // $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        // return $actionBtn;


                        $editRoute =   route('edit-event', ['id' => $row->id]);
                        $deleteRoute = route('delete-event', ['id' => $row->id]);

                        $actionBtn = '<a href="' . $editRoute . '" class="edit btn btn-success btn-sm">Edit</a>';
                        $actionBtn .= ' <a href="' . $deleteRoute . '" class="delete btn btn-danger btn-sm">Delete</a>';

                       return $actionBtn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('head-family/all-event');

    }catch (Exception $e) {
            dd($e->getMessage());
            return back()->withErrors($e->getMessage());

    }

 }


     // **********Edit Events**********
    public function editEvent($id)
    {
       try{
            $event = Event::find($id);
            return view('head-family/edit-event', compact('event'));

     }catch (Exception $e) {
            dd($e->getMessage());
            return back()->withErrors($e->getMessage());

        }
    }


  public function updateEvent(Request $request, $id)
    {
        // dd($request);
        $student = Event::find($id);
        $student->event_name = $request->input('event_name');
        $student->description = $request->input('description');
        $student->place = $request->input('placeLocation');
        $student->date_time = $request->input('Date_time');
        $student->update();
        return redirect()->back()->with('status','Event Updated Successfully');
    }

    // ********** Delete Event **********


    public function deleteEvent($id)
    {
        $student = Event::findOrFail($id);
        $student->delete();
        return back()->with('message','Event Deleted');
    }


// **********profile password update**********
    public function changePasswordPost(Request $request)
     {
       $request->validate([
           'current_password'  => 'required',
           'new_password'      => 'required|min:6',
           'confirm_password' => 'required|same:new_password|min:6',
       ]);

       if (!(Hash::check($request->current_password, Auth::user()->password))) {

           return redirect()->back()->with("error", "Your current password does not match with the password you entered.");
       }

       if (strcmp($request->current_password, $request->new_password) == 0) {
           // Current password and new password same
           return redirect()->back()->with("error", "New Password cannot be same as your current password.");
       }

       $user = User::find(Auth::user()->id);
       $user->password = Hash::make($request->new_password);
       $user->save();
       return redirect()->back()->with("success", "Password successfully changed!");
   }

}
