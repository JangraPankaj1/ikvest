<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Comment;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;


class HeadInvestmentController extends Controller
{

       public function showAddInvestmentPage()
        {
            return view('head-family.investment-docs');
        }

        public function showInvestmentPage(Request $request)
        {
            $userId = Auth::user()->id;

            $data = Investment::where('user_id', $userId)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get();

            // Extract video IDs from video_link and add them to the $data collection
            foreach ($data as $investment) {
                $videoId = $this->extractVideoId($investment->video_link);
                $investment->video_id = $videoId;
            }

            return view('head-family/view-investment-docs', compact('data'));
        }

        private function extractVideoId($videoLink)
        {
            // Extract the video ID from the YouTube video link
            if (preg_match('/\?v=([A-Za-z0-9_\-]+)/', $videoLink, $matches)) {
                return $matches[1];
            }

            // Handle other video platforms or invalid links here if needed
            return null;
        }



      // ********* Upload Posts *******

      public function uploadDocs(Request $request)
          {

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
             $investment->video_link  = $request->url;
             $investment->video_type  = $request->video_platform;
             $investment->save();


             $userId = Auth::user()->id;

             // Fetch all investment documents for the user and eager load the 'user' relationship
               $data = Investment::where('user_id', $userId)
                 ->with('user')
                 ->get();

                 return redirect()->route('get.view.investment')
                 ->with('data', $data);

              // return view('head-family/timeline', compact('data','memberCount'));

          }else{

                $investment = new Investment;
                $investment->user_id  = Auth::user()->id;
                $investment->description  = $request->description;
                $investment->video_link  = $request->url;
                $investment->video_type  = $request->video_platform;
                $investment->save();

                $userId = Auth::user()->id;

            // Fetch all investment documents for the user and eager load the 'user' relationship
              $data = Investment::where('user_id', $userId)
                ->with('user')
                ->get();

                return redirect()->route('get.view.investment')
                ->with('data', $data);
          }
      }catch (Exception $e) {
          dd($e->getMessage());
          return back()->withErrors($e->getMessage());
      }
   }


//delete investment post
     public function deletePostInvestment($id)
          {

          try {

              $post = Investment::findOrFail($id);
              if ($post) {
                $post->delete();
                // Optionally, you can return a success message here
                return response()->json(['message' => 'Investment Post deleted successfully'], 200);
           } else {
                // Handle the case where the item was not found
                return response()->json(['error' => 'Investment Post deleted successfully'], 500);

           }

          } catch (\Exception $e) {
              // Return an error JSON response
              return back()->with('error','Post not deleted ');
          }

       }
}
