<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DocumentController extends Controller
{
    //
    public function index(){

        // $publications = Document::whereType('publication')->latest()->get()->take(5);
        // $policies = Document::whereType("policy")->latest()->get()->take(5);
        // $directives = Document::whereType("directive")->latest()->get()->take(5);

        $documents = Document::latest()->get()->all();

        return view('admin.documents.index', [
            "page_title" => "Documents",
            // "publications" => $publications,
            // "policies" => $policies,
            // "directives" => $directives,
            "documents" => $documents
        ]);

    }

    public function create()
    {
        return view('admin.documents.create', [
            "page_title" => "Create Document"
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "string",
            "title" => "required|string",
            "description" => "required|string",
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "file" => "required|file|max:4000"
        ]); 
        
        if($request->hasFile('image')){
        $newImage = time() . "-image" . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/documents/image/'), $newImage);
    }else{
        $newImage= null;
    }

        if ($request->hasFile('file')){
            $postPath = time() . '-file' . $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/documents/file/'), $postPath );
        }else{
                $postPath = "NoFile";
        }

        $document = new Document;

        $document->type = $request->type;
        $document->title = $request->title;
        $document->slug = SlugService::createSlug(Document::class, 'slug', $request->title);
        
        

        $document->description = $request->description;

        $document->image = $newImage;
        $document->file = $postPath;

        if($document->save()){

        return redirect('admin/documents/index')->with("success", "Document Stored!");
    }

 

    }

    public function edit(Document $document, $id)
    {
        $document = Document::find($id);

        return view('admin.documents.update', [
            'document' => $document,
            'page_title' => "Document Update"
        ]);
    }


    public function update(Request $request, Document $document)
    {
        $request->validate([
            "type" => "string",
            "title" => "required|string",
            "description" => "required|string",
            "image" => "image|mimes:jpg,png,peg,gif,svg|max:2048",
            "file" => "file|max:4000"
        ]);

        $document = Document::find($request->id);

        if ($request->hasFile('file')){
            $postPath = time(). '-file' . $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/documents/file/'), $postPath );
            Storage::delete('uploads/documents/file/' . $document->file);
            $document->file = $postPath;
        }else {

                $postPath = "NoFile";

        }
        

        if ($request->hasFile('image')) {
            $newImageName = time() . '-image' . $request->title . $request->image->extension();
            $request->image->move(public_path('uploads/documents/image/'), $newImageName );
            Storage::delete('uploads/documents/image/' . $document->image);
            $document->image = $newImageName;
        }else{
            unset($request['file']);
            
        }

        $document->type = $request->type;
        $document->title = $request->title;
        $document->slug = SlugService::createSlug(Document::class, 'slug', $request->title);
        $document->description = $request->description;

        $document->save();

        return redirect("admin/documents/index")->with('success', "Document Stored!");

    }


    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect("admin/documents/index")->with('success', "Document Deleted!");
    }

}
