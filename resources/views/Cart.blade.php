@extends('layouts.appShop')


@section('fooTer')
<div class="container">
  <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
                    </div>
                    @if (session('NototalItmes'))
                        <div role="alert alert-danger">No Items Inside Cart</div>
                    @endif
                    <div></div>
                    @if (session('cartItemUpdated'))
                    <div class="alert alert-success" role="alert">
                       <p>cart item updated</p>
                    </div>                       
                    @endif
                        @if (session('totalamount'))
                        <div class="cart-table clearfix">
                            <table class="table table-responsive table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th></th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>                               
                                @foreach ($items ?? '' ?? '' as $item)                            
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><img class="tiny" src="{{$item->options->image}}" alt="" srcset=""></td>
                                    <td class="cart_product_desc"><h5>{{ $item->name }} </h5></td>
                                        <td class="price"><span>{{ $item->price }} </span></td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                            <div class="quantity">
                                                <form action="{{url('updateCartitem')}}" method="post"> @csrf
                                                    <input type="hidden" value="{{$item->rowId}}" name="rowId">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" value="{{ $item->qty }}" id="qty3" step="1" min="1" max="300" name="quantity" value="1" style="width: 90px;">
                                                
                                                    
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>                                       
                                        </td>
                                        <td colspan="2">
                                        <a href="{{url('deleteCartItem/')}}/{{$item->rowId}}" class="btn btn-danger">Remove</td>                                
                                </tr>
                                    @endforeach                               
                                </tbody>
                                <tfoot>
                                    <tr ><td colspan="3"></td><td colspan="2"> Subtotal {{ $subtotal}}</td><tr>
                                        <tr><td colspan="3"></td><td colspan="2">tax {{$tax}}</td></tr>
                                        <td colspan="2"><td><h4>Total  &nbsp; =</h4></td><td>{{ $total }}</td></tr>                                   
                                </tfoot>
                            </table>
                        </div>
                        @endif  
                    
                </div>
        
            </div>
        </div>
    </div>
</div>
<style>
    .tiny{
        width: 70px;
        height: 70px;
    }
</style>    
@endsection