@props(['name','type'=>'text','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <input type="{{$type}}" class="form-control" name="{{$name}}" id="{{$name}}"  value="{{old($name)}}"aria-describedby="emailHelp">
<x-error :name="$name"/>
</x-form.input-wrapper>
