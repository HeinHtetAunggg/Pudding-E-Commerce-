<x-layout>
    @if(session('success'))
     <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
<div class="container text-center mt-4">
    <div class="text-center fs-1 my-3">Welcome To Our Pudding Industry</div>
   <x-card-wrapper>
    <div class="row">
    <div class="col-md-6 ">
        <div class="text-center">
            <h3 class="d-flex justify-content-start text-secondary">Caramel Pudding</h3>
            <div class="intro my-3">
            <h1 class=" d-flex justify-content-start text-dark">Delicious</h1>
       <h1 class=" d-flex justify-content-start text-dark ">Caramel</h1>
       <h1 class=" d-flex justify-content-start text-dark">Pudding</h1>
            </div>        
        </div>
        <div class="d-flex justify-content-start mt-3">
        <a class="btn btn-dark " href="/menu">Explore More</a>
        </div>
    </div>
    <div class="col-md-6">
        <img src="/cover/caramel.jpg" alt="" class="img-fluid">
    </div>
</div>
   </x-card-wrapper>
</div>
{{--end of the best show page--}}

{{--start of what we do--}}

<section class="container mt-4 ">
    <div class="col-md-12 text-center">
        <h3 class="text-primary">What We Do</h3>
        <div class="col-md-6 mx-auto">
        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa et suscipit laudantium autem, qui rerum nam quod impedit asperiores dignissimos minus quo porro soluta, dolores magni neque! Error consectetur quo cupiditate quos, nemo excepturi! Sunt sed praesentium dignissimos facilis velit nostrum molestiae facere aperiam possimus at, consectetur quae, perferendis aliquid! Voluptates, quia cumque earum ea molestiae quaerat placeat fugit ad necessitatibus incidunt aliquam alias odio provident numquam veritatis, vero maiores! Suscipit deleniti incidunt modi deserunt, exercitationem itaque minima eligendi magni fugit perferendis consectetur, natus neque. Libero, culpa officiis iusto laudantium hic minima numquam laboriosam tempora at blanditiis magnam recusandae quae?</p>
       <a href="/menu" class="btn btn-dark">Go To Main Menu</a>
    </div>
    </div>

</section>



{{--end of what we do--}}


{{--start of showing products randomly--}}
<div class="container text-center my-4 ">
    <x-card-wrapper>
    <div class="row">
    <div class="col-md-12 text-center ">
        <p class="text-primary fs-1">Puddings You May Like</p>
        <div class="d-flex">
            @foreach ($randomPuddings as $randomPudding)
            <div class='col-md-3'>
                <div class="card p-4 m-4 shadow-sm">
                <img src='{{asset("$randomPudding->image")}}' alt="" class="img-fluid">
                </div>
                <a href="/menu?category={{$randomPudding->category->slug}}"><span class="badge rounded-pill bg-dark my-1">{{$randomPudding->category->name}}</span></a>
                <p class="text-center fw-bold">{{$randomPudding->name}}</p>
                <h5 class="text-primary">$ - {{$randomPudding->price}}</h5>
            </div>
            @endforeach
        
       
        </div>
    </div>
</div>
    </x-card-wrapper>
</div>
{{--end of showing product randomly--}}

</x-layout>