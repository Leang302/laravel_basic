@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Create Blog</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Catagory</label>
                        <select name="" id="">
                            @foreach ($catagories as $catagory)
                                <option value="">{{ $catagory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>\
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Body</label>\
                        <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <label for="exampleInputEmail1" class="form-label">Shpw/Hide</label>
                    <select name="status" id="">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
