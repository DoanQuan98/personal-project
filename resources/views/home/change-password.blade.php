@extends('home.layout.master')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        @if(session()->has('not-match'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('not-match') }}
            </div>
        @endif
        @if(session()->has('wrong-password'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('wrong-password') }}
            </div>
        @endif
        <form method="post" action="{{route('auth.change-password')}}">
            @csrf
            <input type="text" value="{{ auth()->user()->email }}" hidden name="email">

            <div class="col-mt-5">
                <label for="exampleInputEmail1">Old password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter Password">
            </div>
            <div class="col-mt-5">
                <label for="exampleInputPassword1">New password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="newPassword" placeholder="Enter Password">
            </div>
            <div class="col-mt-5">
                <label for="exampleInputPassword1" class="text-dark">Import new password</label>
                <input type="password" name="confirmPassword" placeholder="Enter Password" class="form-control">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
