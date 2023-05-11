@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="col-lg-6">
        <h1 class="text-center">Update Profile</h1>
        <form action="{{route('admin.update_profile')}}" method="POST" role="form">
            @csrf @method('PUT')

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$auth->name}}" placeholder="">
                @error('name')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{$auth->email}}"  placeholder="">
                @error('email')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Confirm password</label>
                <input type="password" class="form-control" name="password" placeholder="">
                @error('password')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@stop()