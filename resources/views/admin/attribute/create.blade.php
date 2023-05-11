@extends('layouts.admin')
@section('main')
<div class="container">
  <div class="col-lg-5">
    <h1 class="text-center">Create Attribute</h1>
    <form action="{{route('attribute.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="">Name</label>
        <select class="form-control" name="name" onchange="optionAttr(this)">
          <option value="size" selected>Size</option>
          <option value="color">Color</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Value</label>
        <input id="value" type="text" name="value" class="form-control" placeholder="">
        @error('value')
        <small style="font-weight: 700; color: red;">{{$message}}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Description</label>
        <input type="text" name="description" class="form-control" placeholder="">
      
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
@stop()