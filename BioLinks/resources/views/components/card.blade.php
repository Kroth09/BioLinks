@props(['title' => null, 'actions' => null])

<div class="card bg-base-100  shadow-xl w-full max-w-md min-h-87">
    <div class="card-body items-center">
        @if($title)
            <div class="card-title mb-6">{{ $title }}
            </div>
        @endif
        <div class="w-full">
            {{ $slot }}
        </div>
        @if($actions)
            <div class="card-actions flex items-center justify-between mt-6 ">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
