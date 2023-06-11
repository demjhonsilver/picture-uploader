<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PicturesController extends Controller
{

    public function index()
    {
        $pictures = Picture::orderBy('created_at', 'desc')->get();
        return view('pictures.index', compact('pictures'));
    }
    public function upload()
    {
        return view('pictures.upload');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'image_name' => 'required',
            'attached_image_file' => 'required|mimes:png,jpg,jpeg|max:1999'
        ]);
    
        $fileNameToStore = $this->handleFileUpload($request);
    
        Picture::create([
            'image_name' => $request->input('image_name'),
            'attached_image_file' => $fileNameToStore
        ]);
    
        return redirect()->route('pictures.index');
    }
    
    private function handleFileUpload(Request $request) {
        if ($request->hasFile('attached_image_file')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('attached_image_file')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('attached_image_file')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //Upload Pic
            $path = $request->file('attached_image_file')->storeAs('public/gallery/image',$fileNameToStore);
        } else {
            $fileNameToStore = '';
        }
        return $fileNameToStore;
    }


    public function show($id)
    {
        $picture = Picture::find($id);
        return view('pictures.show',compact('picture'));
    }
    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $picture = Picture::find($id);
        $this->validate($request, [ 'image_name' => 'required']);
        $picture->image_name = $request->input('image_name');
        $picture->save();
        return redirect('/pictures/' . $id);
    }
    
    
    public function delete($id)
    {
        $picture = Picture::find($id);
        if($picture->attached_image_file != ''){
            //Delete Pic
             Storage::delete('public/gallery/image/'.$picture->attached_image_file);
          }
        $picture->delete();
        return redirect('/');
    }
}