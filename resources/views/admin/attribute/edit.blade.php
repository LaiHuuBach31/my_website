@extends('layouts.admin')
@section('main')
<div class="container">
  <div class="col-lg-5">
    <h1 class="text-center">Update Attribute</h1>
    <form action="{{route('attribute.update', $attribute->id)}}" method="post">
      @csrf @method('PUT')
      <div class="form-group">
        <label for="">Name</label>
        <select class="form-control" name="name" onchange="optionAttr(this)">
          <option value="size" {{$attribute->name == 'size' ? 'selected' : ''}}>Size</option>
          <option value="color" {{$attribute->name == 'color' ? 'selected' : ''}}>Color</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Value</label>
        <input type="{{$attribute->name == 'size' ? 'text' : 'color'}}" name="value" value="{{$attribute->value}}" class="form-control" placeholder="" id="value">
        @error('value')
        <small style="font-weight: 700; color: red;">{{$message}}</small>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Description</label>
        <input type="text" name="description" value="{{$attribute->description}}" class="form-control" placeholder="">
      
      </div>
      
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@stop()