<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Catagory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blog = Blog::with('catagory')->get();
        // return $blog;
        $catagory = Catagory::with('blogs')->get();
        return $catagory;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catagories = Catagory::all();
        return view('blogs.create',["catagories"=>$catagories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'catagory'=>['required','integer'],
            'title'=>['required','max:255','min:2'],
            'body'=>['required'],
            'status'=>['required','boolean'],
            'image'=>['required','image','max:3000']
        ]);
        $imagePath=$this->uploadFile($request);

        $blog =  new Blog();
        $blog->catagory_id= $request->catagory;
        $blog->name = $request->title;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->image = $imagePath;
        $blog->save();
        session()->flash('success','Your Blog has been created successfully');
        return redirect()->back();
    }

    public function uploadFile(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads',$imageName));
            $imagePath = 'uploads/'.$imageName;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
