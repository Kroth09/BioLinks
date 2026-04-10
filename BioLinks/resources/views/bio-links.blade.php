<x-layout.app>

    <x-container>

        <div class="text-center space-y-4">
            <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture"/>
            <div class="font-bold text-2xl tracking-wide">{{ $user->name }}</div>
            <div class="font-sm italic opacity-80">{{ $user->description }}</div>

            <ul class="space-y-3 text-center flex flex-col justify-centers">
                @foreach($links as $link)
                    <li class="flex items-center gap-2 justify-center ">

                      <x-button href="{{ $user->link }}" class="text-amber-50 btn btn-soft btn-primary text-center w-full" ghost block outline info target="_blank">
                          {{ $link->name }}
                      </x-button>

                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>

</x-layout.app>
