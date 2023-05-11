@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="col-lg-5">
        <h1 class="text-center mb-5">Update Image</h1>
        <form action="{{route('image.update', $image->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="">Images</label>
                <input type="file" name="uploads[]" class="form-control" placeholder="" onchange="show_image(this)" multiple>
                <img src="{{url('uploads')}}/{{$image->value}}" id="" alt="" width="70px"> 
                <img src="" id="show_1" width="100px" alt="">
                <img src="" id="show_2" width="100px" alt="">
                <img src="" id="show_3" width="100px" alt="">
                @error('uploads')
                <small style="font-weight: 700; color: red;">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Product_id</label>
                <select class="form-control" name="product_id" id="">
                    @foreach($products as $item)
                    <option value="{{$item->id}}" {{$item->id == $image->product_id ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@stop()