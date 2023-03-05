<div class="dropdown mt-5">
    <p class="text-center text-primary fs-5">Filter By Category</p>
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{isset($currentCategory)?$currentCategory->name:'Category List'}}
    </button>
    <ul class="dropdown-menu ">
        <li><a href="/menu" class="dropdown-item">All</a></li>
        @foreach($categories as $category)                        
        <li><a class="dropdown-item" href="/menu?category={{$category->slug}}{{request('search')?'&search='.request('search'):''}}">{{$category->name}}</a></li>
        @endforeach     
    </ul>
</div>