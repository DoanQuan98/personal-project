@extends('home.layout.master')
@section('content')
    <div class="container">
        <form method="post" action="{{route('auth.post')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
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
