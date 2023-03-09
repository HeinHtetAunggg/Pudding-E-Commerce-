<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/menu">Pudding Company</a>
    <div class="d-flex">
        <a href="/" class="nav-link">Home</a>
        @auth
        @can('admin')
        <a href="/admin/category/create" class="nav-link">Category</a>
        @endcan
        <img src="/storage/{{auth()->user()->avatar}}" class="rounded-circle" alt="" width="50" height="60" />
        <a href="" class="nav-link">Welcome {{auth()->user()->name}}</a>
        <form action="/logout" method="POST">
            @csrf
        <button type="summit" class="nav-link btn btn-link text-danger">Logout</button>
        </form>
        @else
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>

        @endauth

        <a href="" class="nav-link">About</a>
        <a href="" class="nav-link">Contact</a>
    
        <form action="/menu" method="GET">
    <div class="input-group">
        @if(request('category'))
        <input type="hidden" name="category" value="{{request('category')}}">
        @endif
    <input type="search" class="form-control" name="search" value="{{request('search')}}" asdutocomplete="false">
    <button type="submit" class="input-group-text bg-primary">Search</button>
</div>
</form>
</div>

</div>
</nav>


