@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center mb-5">Create Product</h1>
    <div class="row">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    @error('name')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Category_id</label>
                    <select class="form-control" name="category_id" id="">
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="">
                    @error('price')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="">Discount</label>
                    <input type="text" name="discount" class="form-control" placeholder="">
                    @error('discount')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div> -->
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            <div class="col-lg-4">
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="">Avatar</label>
                    <input type="file" name="upload" class="form-control" placeholder="" onchange="show_img(this)">
                    <img src="" id="avatar" width="70px" alt="">
                    @error('upload')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label for="">Images</label>
                    <input type="file" name="uploads[]" class="form-control" placeholder="" onchange="show_imgs(this)" multiple>
                    <img src="" id="avatar_1" alt="" width="70px">
                    <img src="" id="avatar_2" alt="" width="70px">
                    <img src="" id="avatar_3" alt="" width="70px">
                    @error('uploads')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Color</label>
                    <div style="display: flex; align-items: center; ">
                        @foreach($colors as $item)
                        <div class="form-check" style="width: 33%;">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="attr_id[]" value="{{$item->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: {{$item->value}};" class="icon icon-tabler icon-tabler-shirt-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14.883 3.007l.095 -.007l.112 .004l.113 .017l.113 .03l6 2a1 1 0 0 1 .677 .833l.007 .116v5a1 1 0 0 1 -.883 .993l-.117 .007h-2v7a2 2 0 0 1 -1.85 1.995l-.15 .005h-10a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-5a1 1 0 0 1 .576 -.906l.108 -.043l6 -2a1 1 0 0 1 1.316 .949a2 2 0 0 0 3.995 .15l.009 -.24l.017 -.113l.037 -.134l.044 -.103l.05 -.092l.068 -.093l.069 -.08c.056 -.054 .113 -.1 .175 -.14l.096 -.053l.103 -.044l.108 -.032l.112 -.02z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Size</label>
                    <div style="display: flex; align-items: center; ">
                        @foreach($sizes as $item)
                        <div class="form-check" style="width: 33%;">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="attr_id[]" value="{{$item->id}}">
                                {{$item->value}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div style="display: flex; align-items: center; ">
                        <div class="form-check" style="width: 33%;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="1" checked>
                                In stok
                            </label>
                        </div>
                        <div class="form-check" style="width: 33%;">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="0">
                                Out stok
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop()