<x-layout>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form action="/admin/puddings/store" method="POST" enctype="multipart/form-data">
                @csrf
                <x-card-wrapper class="shadow-sm">
                <h3 class="text-center text-primary">Menu Registration</h3>
                <x-form.input type="text" name="name"/>
                <x-form.input type="text" name="slug"/>
                <x-form.input type="number" name="price"/>
                <x-form.input type="file" name="image"/>
                <x-form.textarea name="body"/>
                <x-form.input-wrapper>
                <x-form.label name="category"/>
                <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
                </x-form.input-wrapper>
                <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                </x-card-wrapper>
            </form>
        </div>
    </div>
</div>

</x-layout>