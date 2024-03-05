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
            'status'=>['required','boolean']
        ]);
        $blog =  new Blog();
        $blog->image = $request->image;
        $blog->name = $request->title;
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->save();
        session()->flash('success','Your Blog has been created successfully');
        return redirect()->back();
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
