<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use App\Document;

class UploadController extends Controller
{
    public function add(Request $request) {

 		try{
	 		if( $request->hasFile('files'))
	    	{ 	
				$file = $request->file('files');
				$extension = $file->getClientOriginalExtension();
				Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
				$entry = new Document();
				$entry->mime = $file->getClientMimeType();
				$entry->original_docname = $file->getClientOriginalName();
				$entry->docname = $file->getFilename().'.'.$extension;
				$entry->save();
	 		}
	 		else{
	 			return response()->json(['error' => 'No Image Found']);
	 		}
	 	}
 		catch(Exception $e){

 		}
		return response()->json(['success' => 'Document uploaded successfully','document_id' => $entry->id,'document_name' => $entry->original_docname]);
		
	}

	public function get($id){
		
		$entry = Document::where('id', '=', $id)->firstOrFail();
		$file =  Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($entry->docname);
        return \Response::download($file);
	}
}
