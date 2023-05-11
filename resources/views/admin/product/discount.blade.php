@extends('layouts.admin')
@section('main')
<div class="container">
    <h1 class="text-center">Discount Product</h1>
    <table class="table table-bordered text-center">
        <form action="{{route('product.calculate')}}" method="post">
            @csrf
            <div class="form-group form-inline">
                <input type="text" name="sale" class="form-control" placeholder="........%" style="width:200px">
                <input type="hidden" name="list_product" id="id_product">
                <button type="submit" class="btn btn-success"><i class="fa fa-reply-all" aria-hidden="true"></i></button>
            </div>
        </form>

        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DISCOUNT</th>
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
                <td style="vertical-align: middle;">{{$item->price}}</td>
                <td style="vertical-align: middle;">{{$item->discount}}</td>
                <td style="vertical-align: middle;">
                    <img src="{{url('uploads')}}/{{$item->image}}" width="70px" alt="">
                </td>

                <td style="vertical-align: middle;">{{$item->cate->name}}</td>
                <td style="vertical-align: middle;">
                    @foreach($item->pro_attr as $item1)
                    @if($item1->name == 'size')
                    <div><b>{{$item1->name}}</b>: {{$item1->value}}</div>
                    @else
                    <div>
                        <b>{{$item1->name}}</b>:
                        <svg xmlns="http://www.w3.org/2000/svg" style="color:{{$item1->value}}" class="icon icon-tabler icon-tabler-shirt-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14.883 3.007l.095 -.007l.112 .004l.113 .017l.113 .03l6 2a1 1 0 0 1 .677 .833l.007 .116v5a1 1 0 0 1 -.883 .993l-.117 .007h-2v7a2 2 0 0 1 -1.85 1.995l-.15 .005h-10a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-5a1 1 0 0 1 .576 -.906l.108 -.043l6 -2a1 1 0 0 1 1.316 .949a2 2 0 0 0 3.995 .15l.009 -.24l.017 -.113l.037 -.134l.044 -.103l.05 -.092l.068 -.093l.069 -.08c.056 -.054 .113 -.1 .175 -.14l.096 -.053l.103 -.044l.108 -.032l.112 -.02z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </div>
                    @endif
                    @endforeach
                </td>
                <td style="vertical-align: middle;">{{$item->status == 1 ? 'In Stock' : 'Out Stock'}}</td>
                <td style="vertical-align: middle;">
                    <form action="" method="post">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="" id="" value="{{$item->id}}" onclick="check_discount(this)">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->appends(request()->all())->links()}}
</div>

<script>
    let data = [];


    function check_discount(e) {

        let item = e.value;

        if (data.includes(item)) {

            data.filter((e) => {
                return e != item;
            });

        } else {
            data.push(item);
        }

        document.getElementById('id_product').value = data;

    }
</script>
@stop()