@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center">List Categories</h1>
    <table class="table table-bordered text-center">
        <form action="" method="get">
            <div class="form-group form-inline">
                <input type="text" name="keyword" class="form-control" placeholder="Search........." style="width:300px">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="{{route('category.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
            </div>
        </form>

        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->status == 0 ? 'Out Stock' : 'In Stock'}}</td>
                <td>

                    <a href="{{route('category.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
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

                                        <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf @method('DELETE')
                                            
                                                <h5>Are you sure ???</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete Category</button>
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
    {{$categories->appends(request()->all())->links()}}
</div>
@stop()