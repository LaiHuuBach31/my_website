@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center mb-5">Create Permission</h1>
    <div class="col-lg-5">
        <form action="{{route('permission.update', $permission->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Module</label>
                <input type="text" name="name" value="{{$permission->name}}" class="form-control" placeholder="">
                @error('name')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Your option</option>
                    <?= $htmlOption ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Key_Code</label>
                <select class="form-control" name="module_parent">
                    <option value=""></option>
                    @foreach(config('permission.table_module') as $moduleItem)
                    <option value="{{$moduleItem}}" >{{$moduleItem}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                @foreach(config('permission.module_children') as $moduleItemChildren)
                <div class="col-lg-3 text-center">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="module_children" value="{{$moduleItemChildren}}">
                            {{$moduleItemChildren}}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop()