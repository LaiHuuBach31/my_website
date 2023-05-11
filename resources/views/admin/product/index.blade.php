@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center">List Product</h1>
    <table class="table table-bordered text-center">
        <form action="" method="get">
            <div class="form-group form-inline">
                <input type="text" name="keyword" class="form-control" placeholder="Search........." style="width:300px">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a href="{{route('product.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
            </div>
        </form>

        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE / SALE_PRICE</th>
                <th>IMAGE</th>
                <th>CATEGORY_ID</th>
                <th>ATTRIBUTE</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td style="vertical-align: middle;">{{$item->id}}</td>
                <td style="vertical-align: middle;">{{$item->name}}</td>
                <td style="vertical-align: middle;">{{$item->price}} / <p class="btn btn-success">{{$item->discount}}</p>
                </td>
                <td style="vertical-align: middle;">
                    <img src="{{url('uploads')}}/{{$item->image}}" width="70px" alt="">
                </td>
                <td style="vertical-align: middle;">{{$item->cate->name}}</td>
                <td style="vertical-align: middle;">
                    @foreach($item->attr as $item2)
                    @if($item2->attr_name->name == 'size')
                    <div><b>{{$item2->attr_name->name}}</b>: {{$item2->attr_name->value}}</div>
                    @else
                    <div>
                        <b>{{$item2->attr_name->name}}</b>:
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:{{$item2->attr_name->value}}" class="icon icon-tabler icon-tabler-shirt-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14.883 3.007l.095 -.007l.112 .004l.113 .017l.113 .03l6 2a1 1 0 0 1 .677 .833l.007 .116v5a1 1 0 0 1 -.883 .993l-.117 .007h-2v7a2 2 0 0 1 -1.85 1.995l-.15 .005h-10a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-5a1 1 0 0 1 .576 -.906l.108 -.043l6 -2a1 1 0 0 1 1.316 .949a2 2 0 0 0 3.995 .15l.009 -.24l.017 -.113l.037 -.134l.044 -.103l.05 -.092l.068 -.093l.069 -.08c.056 -.054 .113 -.1 .175 -.14l.096 -.053l.103 -.044l.108 -.032l.112 -.02z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </div>
                    @endif
                    @endforeach
                </td>
                <td style="vertical-align: middle;">{{$item->status == 1 ? 'In Stock' : 'Out Stock'}}</td>
                <td style="vertical-align: middle;">
                    
                        <a href="{{route('product.edit', $item->id)}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
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

                                        <form action="{{ route('product.destroy', $item->id) }}" method="post">
                                            <div class="modal-body">
                                                @csrf @method('DELETE')
                                                <h5>Are you sure ???</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
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
    {{$products->appends(request()->all())->links()}}
</div>
@stop()