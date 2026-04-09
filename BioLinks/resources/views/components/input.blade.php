@props(['name', 'prefix' => null])

<label class="input w-full mb-7 rounded-lg">
    @if($prefix)
        <span>{{$prefix}}</span>
    @endif
    <input type="text" class="grow" name="{{ $name }}" {{ $attributes->except('name') }} />
</label>
