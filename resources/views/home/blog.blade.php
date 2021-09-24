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
    <hr>
    <div class="orm-group container">
        <div class="media">
            <a href="#"><img alt="#" src="{{ asset('image/huan-rose.jpg') }}"
                             class="mr-3 rounded-pill"
                             style="max-width: 50px; max-height: 50px"></a>
            <div class="media-body">
                <div class="reviews-members-header">
                    <h6 class="mb-0"><a class="text-dark" href="#">Huấn Rose</a></h6>
                    <p class="text-muted small">Tue, 20 Mar 2020</p>
                </div>
                <div class="reviews-members-body">
                    <p>
                        Em có sai với ai đi nữa, có làm cái gì đi nữa. Nếu có phải trả giá thì em
                        cũng xin chấp nhận.
                        Bởi vì anh biết đấy. Ra xã hội làm ăn bươn chải, liều thì ăn nhiều, không
                        liều thì ăn ít.
                        Muốn thành công thì phải chấp nhận trải qua đắng cay ngọt bùi. Làm ăn muốn
                        kiếm được tiền
                        thì phải chấp nhận mạo hiểm, nguy hiểm một tí nhưng trong tầm kiểm soát.
                        Xã hội này, chỉ có làm, chịu khó cần cù thì bù siêng năng..
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <form>
        <div class="form-group container"><label class="form-label small">Your Comment</label>
            <textarea class="form-control"></textarea>
        </div>
        <div class="form-group container">
            <button type="button" class="btn btn-primary"> Submit Comment</button>
        </div>
    </form>
@endsection
