<x-layout>

<div class="container">
    <div class="row">
<div class="col-md-8 mx-auto">
    <x-card-wrapper>
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
    <h3 class="text-center text-priimary">Registration Form</h3>
    <x-form.input name="name"/>
    <x-form.input name="username"/>
    <x-form.input name="email" type="email"/>
    <x-form.input name="password" type="password"/>
    <x-form.input name="image" type="file"/>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </x-card-wrapper>
</div>
</div>
</div>
</x-layout>