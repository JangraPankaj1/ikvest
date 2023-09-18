<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Comment;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;




class HeadInvestmentController extends Controller
{
    
    public function showInvestmentPage()
    {

        return view('head-family.investment-docs');
    }


      // ********* Upload Posts *******

      public function uploadDocs(Request $request)
        {
           dd($request);

           try {
              $request->validate(
                  [
                      'description' => 'required',
                  ]
              );


          if ($request->hasFile('files')) {
              $images = $request->file('files');
              $imageData = [];

              foreach ($images as $image) {

                  $imageName = $image->getClientOriginalName();
                  $image->move(public_path('images'), $imageName);

                  $imageData[] = [
                      'image_name' => $imageName,
                      'image_path' => 'images/' . $imageName,
                  ];
              }

             $investment = new Investment;
             $investment->user_id  = Auth::user()->id;
             $investment->description  = $request->description;

             $investment->docs = json_encode(array_column($imageData, 'image_name'));
             $investment->docs_path = json_encode(array_column($imageData, 'image_path'));
             $investment->save();



             $data = Investment::join('users', 'posts.posted_by', '=', 'users.id')->orderBy('posts.created_at', 'desc')
              ->get(['posts.*', 'users.f_name']);

              $memberCount = Investment::where('parent_id', auth()->user()->id)->count();
               
              return redirect()->route('get.timeline.head')
              ->with('data', $data)
              ->with('memberCount', $memberCount);

              // return view('head-family/timeline', compact('data','memberCount'));


          }else{

                $investment = new Investment;
                $investment->user_id  = Auth::user()->id;
                $investment->description  = $request->description;
                $investment->video_link  = $request->video_platform;
                $investment->video_type  = $request->url;

                $investment->save();

                return redirect()->route('get.investment-docs')
                ->with('data', $investment);

          }
      }catch (Exception $e) {
          dd($e->getMessage());
          return back()->withErrors($e->getMessage());
      }
   }
    

}
