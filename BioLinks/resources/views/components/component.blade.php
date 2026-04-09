@props([
    'title',
    'actions'
])

<div class="mx-auto max-w-screen-md flex items-center justify-center py-20">

    <h1 class="card-title">{{ $tittle }}</h1>
    <div class="card-body">

    {{ $slot }}

    </div>

    <div class="card-actions">
        {{ $actions }}
    </div>

</div>
