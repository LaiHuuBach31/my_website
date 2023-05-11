@extends('layouts.admin')
@section('main')
<div class="container">
  <div class="col-lg-5" style="margin: 0 auto !important;">
    <h1 class="text-center mb-5">Update Category</h1>
    <form action="{{route('category.update', $category->id)}}" method="post">
      @csrf @method('PUT')
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="">
        @error('name')
        <small style="font-weight: 700; color: red;">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}>
            In Stock
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="status" value="0" {{$category->status == 0 ? 'checked' : ''}}>
            Out Stock
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@stop()