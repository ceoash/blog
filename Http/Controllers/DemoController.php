<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * To display the show page
     *
     * @return \Illuminate\Http\Response
     */
    public function showJqueryImageUpload() 
    {
        return view('demos.jqueryimageupload');
    }

    /**
     * To handle the comming post request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveJqueryImageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_picture' => 'required|image|max:1000',
        ]);

        if ($validator->fails()) {
            
            return $validator->errors();            
        }

        $status = "";

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            // Rename image
            $filename = time().'.'.$image->guessExtension();
            
            $path = $request->file('profile_picture')->storeAs(
                 'profile_pictures', $filename
            );

            $status = "uploaded";            
        }
        
        return response($status,200);
    }

}​