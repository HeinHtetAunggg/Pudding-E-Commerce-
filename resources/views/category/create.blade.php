<x-layout>
 @if(session('success'))
 <div class="alert alert-success text-center">{{session('success')}}</div>
 @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3 class="text-center my-4 text-primary">Category Register Form</h3>
                <x-card-wrapper>
    <form action="/admin/category/store" method="POST">
        @csrf
        <x-form.input name="name"/>
        <x-form.input name="slug"/>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
                </x-card-wrapper>
    </div>
</div>
    </div>

</x-layout>