<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;

// import the storage facade
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
	
	public function create(Request $request)
	{
		$Image = Image::all();
		
		return view("create")->with('Images',$Image);
	}
	
	public function store(Request $request)
	{
		$path = $request->file('image')->store('images', 's3');
		
		$image = Image::create([
			'filename' => basename($path),
			'url' => Storage::disk('s3')->url($path)
		]);
		
		$Image = Image::all();
		
		$message = "uploade success";
		
		return view("create")->with('message',$message)->with('Images',$Image);
	}
	
	public function show($id)
	{
		$image = Image::findOrFail($id);;
		
		return Storage::disk('s3')->response('images/' . $image->filename);
		
	}
	
}
