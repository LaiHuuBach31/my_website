@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center">List Image</h1>
    <table class="table table-bordered text-center">
        <form action="" method="get">
            <div class="form-group form-inline">
                <input type="text" name="keyword" class="form-control" placeholder="Search........." style="width:300px">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="{{route('image.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
            </div>
        </form>
        <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>PRODUCT_ID</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>
                    <img src="{{url('uploads')}}/{{$item->value}}" width="70px" alt="">
                </td>
                <td>{{$item->product->name}}</td>
                <td>

                    <a href="{{route('image.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a data-toggle="modal" id="smallButton" data-target="#delete{{$item->id}}" data-attr="" href="" title="Delete category" class="btn btn-danger">
                        <i class="fa fa-trash "></i>
                    </a>


                    <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="smallBody">
                                    <div>
                                        <!-- the result to be displayed apply here -->

                                        <form action="{{ route('image.destroy', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf @method('DELETE')
                                                <h5>Are you sure ???</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete Image</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$images->appends(request()->all())->links()}}
</div>
@stop()