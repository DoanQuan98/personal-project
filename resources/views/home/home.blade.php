@extends('home.layout.master')
@section('content')

    <div class=" px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 ">
            <div class="col-md-10 col-lg-8 col-xl-10">
                <!-- Post preview-->
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('blog', $post->id)}}">

                            <h2 class="post-title">{{$post->title}}</h2>
                            @if(\Illuminate\Support\Facades\Auth::user()->name == $post->user->name)
                                <a href="{{route('post.delete', $post->id)}}" class="delete-post float-right btn-tool" title="Delete" data-toggle="tooltip"
                                   onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-times"></i></a>
                            @endif
                            <h3 class="post-subtitle">{{ $post->user->name }}</h3>

                        </a>

                    </div>

                    <!-- Divider-->
                    <hr class="my-4"/>

                @endforeach
            </div>
        </div>
    </div>

@endsection
