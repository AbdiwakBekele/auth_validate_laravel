@extends('layout')
@section('title', 'Registration Page')

<!-- LoginPage -->
@section('content')

<br>

<div class="container w-50">

    @if(session()->has('error'))
    {{ session('error') }}
    @endif

    @if(session()->has('success'))
    {{ session('success') }}
    @endif

    <form action="/register" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>


@endsection