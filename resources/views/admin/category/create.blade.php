@extends('layouts.admin')
@section('main')
    <div class="container">
        <div class="col-lg-5" style="margin: 0 auto !important;">
        <h1 class="text-center mb-5">Create Category</h1>
            <form action="{{route('category.store')}}" method="post">
              @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                  @error('name')
                    <small style="font-weight: 700; color: red;">{{$message}}</small>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="1" checked>
                        In Stock
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="status" value="0">
                        Out Stock
                      </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@stop()