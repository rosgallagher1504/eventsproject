<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    function dropzone()
    {
     return view('dropzone');
    }

    function upload(Request $request)
    {
     $image = $request->file('file');

     $imageName = time() . '.' . $image->extension();

     $image->move(public_path('gallery'), $imageName);

     return response()->json(['success' => $imageName]);
    }

    function fetch()
    {
     $images = \File::allFiles(public_path('gallery'));
     $output = '<div class="row">';
     foreach($images as $image)
     {
      $output .= '
      <div class="col-md-2" style="margin-bottom:16px;" align="center">
                <img src="'.asset('gallery/' . $image->getFilename()).'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
                <button type="button" class="btn btn-link remove_image" id="'.$image->getFilename().'">Remove</button>
            </div>
      ';
     }
     $output .= '</div>';
     echo $output;
    }

    function delete(Request $request)
    {
     if($request->get('name'))
     {
      \File::delete(public_path('gallery/' . $request->get('name')));
     }
    }
}
?>
