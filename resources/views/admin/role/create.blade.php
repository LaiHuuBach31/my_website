@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center mb-5">Create Role</h1>
    <form action="{{route('role.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="">
            @error('name')
            <small style="font-weight: 700; color: red;">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="row">
            <div class="form-check">
                <label class="form-check-label" style="margin-bottom: 0; padding: 15px;">
                    <input type="checkbox" class="form-check-input check_all" name="" value="">
                    All
                </label>
            </div>
            @foreach($permissionParent as $parent)
            <div class="card">
                <div class="col-lg-12 ">
                    <div class="form-check bg-success text-center">
                        <label class="form-check-label" style="margin-bottom: 0; padding: 15px;">
                            <input type="checkbox" class="form-check-input check_box_wrapper" name="" value="">
                            {{$parent->name}}
                        </label>
                    </div>
                </div>
                @foreach($parent->permiss_children as $children)
                <div class="col-lg-3">
                    <div class="form-check">
                        <label class="form-check-label" style="margin-bottom: 0; padding: 15px;">
                            <input type="checkbox" class="form-check-input check_box_children" name="permiss_id[]" value="{{$children->id}}">
                            {{$children->name}}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@stop()