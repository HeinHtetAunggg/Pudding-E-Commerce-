
<div class="container d-flex justify-content-end mt-3">
    <div class="row">
    <div class="col-lg-12 col-sm-12 col-12">
        <div class="dropdown">
            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="px-1">Cart</span> <span class="badge badge-pill bg-danger">{{count((array) session('cart'))}}</span>
            </button>

            <div class="dropdown-menu">
                    <div class="row total-header-section">
                        @php $total=0 @endphp
                        @foreach ((array) session('cart') as $id=>$details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 text-end ">
                            <p class="mx-2">Total:<span class="text-info">$ {{$total}}</span></p>
                        </div>
                    </div>
                        @if(session('cart'))
                        @foreach (session('cart') as $id=>$details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src=''/>
                                </div>
                                <div class="col-lg-8 col-sm -8 col-8 cart-detail-product">
                                    <p>{{$details['name']}}</p>
                                    <span class="price text-info">$ {{$details['price']}}</span>
                                    <span class="count">Quantity:{{$details['quantity']}}</span>
                                </div>                       
                            </div>
                            <hr class="text-dark"/>
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="/cart" class="btn btn-primary btn-block">View All</a>
                            </div>
                        </div>
                    
            </div>
        </div>
</div>
</div>
</div>
