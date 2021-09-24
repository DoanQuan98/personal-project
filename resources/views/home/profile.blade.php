@extends('home.layout.master')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" src="">
                    <span class="font-weight-bold">{{auth()->user()->name}}</span>
                    <span class="text-black-50">{{auth()->user()->email}}</span>
                    <span> </span>
                </div>
            </div>

            <div class="col-md-5 border-right">
                <form method="post" action="{{ route('auth.profile') }}">
                    @csrf
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="col-mt-3">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-mt-3">
                        <label class="labels">Phone</label>
                        <input type="text" class="form-control" placeholder="phone" name="phone" value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="col-mt-3">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="address" name="address" value="{{ auth()->user()->address }}">
                    </div>
                    <hr>
                    <div class="col-mt-3">
                        <button type="submit" class="btn btn-primary btn-block">save changes</button>
                    </div>

                </div>
                </form>
                <div class="additional">
                    <div class="change_password my-3">
                        <a href="{{route('auth.change-password')}}" class="p-3 border rounded bg-white btn d-flex align-items-center">change password
                            <i class="feather-arrow-right ml-auto"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
