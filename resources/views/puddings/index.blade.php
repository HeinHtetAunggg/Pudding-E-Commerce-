<x-layout>
  @if(session('success'))
  <div class="alert alert-success text-center">{{session('success')}}</div>
  @endif
  <x-mini-shoppingcart/>
<section class="container">
    <div class="row">
        <div class="col-md-2 mt-5  bg-dark">
          <x-category-dropdown/>
        </div>

        <div class="col-md-10 mb-4">
            <p class="fs-1 text-center text-primary">Menu</p>
            <x-card-wrapper>
          <div class="container">
            <div class="row">
                <div class="d-flex justify-content-around gap-2">
                    @forelse ($puddings as $pudding)
                        <div class="card" style="width: 18rem;">
                            <img src="{{$pudding->image}}" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <a href="/menu?category={{$pudding->category->slug}}"><span class="badge rounded-pill bg-dark my-1">{{$pudding->category->name}}</span></a>
                              <h5 class="card-title">{{$pudding->name}}</h5>
                              <h5 class="card-title">Price - {{$pudding->price}}</h5>
                              <p class="card-text">{{$pudding->body}}</p>
                              {{-- <form action="/add-to-cart/add" method="POST">
                                @csrf
                                <label for="quantity" class="text-secondary">Add Quantity</label>
                                <input type="hidden" name="pudding_id" value="{{$pudding->id}}">
                                <input type="number" id="quantity" class="form-control mt-2" name="quantity"> --}}
                                <a href="{{route('add_to_cart',$pudding->id)}}" ><button type="submit" class="btn btn-primary my-3" >Add To Cart</button></a>
                              {{-- </form> --}}
                            </div>
                        </div>
                       @empty
                       <div class="d-grid my-3">
                        <img src="/storage/thumbnails/sorry.jpg" alt="" class="img-fluid mx-auto" width="600" height="300">
                       <h3 class="text-center text-danger mt-4">Sorry We Couldn't Find The Keyword You Entered </h3>
                    </div>
                        
                    @endforelse
                </div>
            </div>
          </div>
          {{$puddings->links()}}
            </x-card-wrapper>
        </div>
    </div>
</section>

</x-layout>