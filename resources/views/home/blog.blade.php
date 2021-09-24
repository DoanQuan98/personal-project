@extends('home.layout.master')
@section('content')

    <header class="masthead" style="">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$posts->title}}</h1>
                        <span class="meta"> Made in by
                                <a href="">{{$posts->user->name}}</a>
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
                    <p>{{$posts->purport}}</p>
                </div>
            </div>
        </div>
    </article>

@endsection
