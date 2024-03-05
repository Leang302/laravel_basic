@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Create Blog</h3>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-scueess">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Catagory</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                        @error('title')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Body</label>
                        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                        @error('body')
                            <code>{{ $message }}</code>
                        @enderror
                    </div>
                    <label for="exampleInputEmail1" class="form-label">Shpw/Hide</label>
                    <select name="status" id="">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
                    @error('status')
                        <code>{{ $message }}</code>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
