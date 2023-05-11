@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="col-lg-5" style="margin: 0 auto !important;">
        <h1 class="text-center mb-5">Create User</h1>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="">
                @error('name')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" placeholder="">
                @error('email')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="">
                @error('password')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select class="form-control select_option_many" name="role_id[]" multiple>
                    <option value=""></option>
                    @foreach($roles as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

@section('js')
<script>
    
</script>
@stop

@stop