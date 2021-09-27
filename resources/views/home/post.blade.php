@extends('home.layout.master')
@section('content')
    <div class="container">
        <form method="post" action="{{route('auth.post')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
            </div>
            <div>
                <label for="exampleInputName1">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="purport"></textarea>
            </div>
            <input type="number" hidden name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
