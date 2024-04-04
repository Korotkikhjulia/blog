@extends('admin.layouts.layout')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-error">
    {{session('error')}}
</div>
@endif
<div class="content-wrapper" style="margin-top:15px">
    <div class="container-fluid">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection