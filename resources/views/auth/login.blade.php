<x-layout>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <x-card-wrapper class="shadow-sm">
                <form action="/login" method="POST">
                    @csrf
                <h3 class="text-center text-primary">Log In Form</h3>
            <x-form.input name="email"/>
            <x-form.input name="password" type="password"/>
            <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
            </x-card-wrapper>
        </div>
    </div>
</div>

</x-layout>