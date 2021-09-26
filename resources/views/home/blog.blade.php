@extends('home.layout.master')
@section('content')
    <header class="masthead" style="background-image: {{asset('storage/'.$post->image) }}">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <span class="meta"> Made in by
                                <a href="">{{$post->user->name}}
                                    {{$post->create_at}}</a>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{$post->purport}}</p>
                </div>
            </div>
        </div>
    </article>
    <hr>
    @foreach($comments as $comment)
        <div class="orm-group container" id="comment-{{$comment->id}}">
            <div class="media">
                <a href="#"><img alt="#" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                 class="mr-3 rounded-pill"
                                 style="max-width: 50px; max-height: 50px"></a>
                <div class="media-body">
                    <div class="reviews-members-header">
                        <h6 class="mb-0"><a class="text-dark" href="#">{{$comment->user->name}}</a></h6>
                        @if(\Illuminate\Support\Facades\Auth::user()->name == $comment->user->name)
                            <a href="{{route('comment.destroy', $comment->id)}}"
                               class="delete-post float-right btn-tool" title="Delete" data-toggle="tooltip"
                               onclick="return confirm('Are you sure?')">
                                <i class="fas fa-times"></i></a>
                        @endif
                        <p class="text-muted small"> {{$comment->created_at}}</p>
                    </div>

                    <div class="reviews-members-body">
                        <p>
                            {{$comment->comment}}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <hr>
    <form method="post" action="{{route('status.comment')}}">
        @csrf
        <input type="text" hidden name="post_id" value="{{$post->id}}">
        <input type="text" hidden name="user_id"
               value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
        <div class="form-group container"><label class="form-label small">Your Comment</label>
            <textarea class="form-control" name="comment"></textarea>
        </div>
        <div class="form-group container">
            <button type="submit" class="btn btn-primary"> Submit Comment</button>
        </div>
    </form>
@endsection
