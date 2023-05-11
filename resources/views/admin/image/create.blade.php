@extends('layouts.admin')
@section('main')
<div class="container">
    <div class="col-lg-5">
        <h1 class="text-center mb-5">Create Image</h1>
        <form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Images</label>
                <input type="file" name="uploads[]" class="form-control" placeholder="" onchange="show_image(this)" multiple>
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
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

@stop()