@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="col-lg-6">
        <h1 class="text-center">Change Password</h1>
        <form action="{{route('admin.update_password')}}" method="POST" role="form">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Current Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="">
                @error('old_password')
                 <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="">
                @error('new_password')
                 <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Confirm New Password</label>
                <input type="password" class="form-control" name="confirm_new_password" placeholder="">
                @error('confirm_new_password')
                 <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop()