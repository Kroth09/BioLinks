<x-layout.app>

    <x-container>
        <div class="text-center space-y-4">
            <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture"/>
            <div class="font-bold text-2xl tracking-wide">{{ $user->name }}</div>
            <div class="font-sm italic opacity-80">{{ $user->description }}</div>

            <ul class="space-y-3 text-center flex flex-col justify-centers">
                @foreach($links as $link)
                    <li class="flex items-center gap-2">

                        {{-- Botão descer --}}
                        @unless($loop->last)
                            <x-form :route="route('links.down', $link)" method="patch">
                                <x-button ghost>
                                    <x-icons.down class="w-6 h-6"/>
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled>
                                <x-icons.down class="w-6 h-6"/>
                            </x-button>

                        @endunless

                        {{-- Botão subir --}}
                        @unless($loop->first)
                            <x-form :route="route('links.up', $link)" method="patch">
                                <x-button ghost>
                                    <x-icons.up class="w-6 h-6"/>
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled>
                                <x-icons.up class="w-6 h-6"/>
                            </x-button>
                        @endunless

                        {{-- Link editar --}}
                        <x-button
                            href="{{ route('links.edit', $link) }}"
                            class=" text-amber-50 btn btn-soft btn-primary text-center w-full"
                        >
                            {{ $link->name }}
                        </x-button>

                        {{-- Botão deletar --}}
                        <x-form
                            :route="route('links.destroy', $link)"
                            method="delete"
                            onsubmit="return confirm('tem certeza?')"
                        >
                            <x-button ghost>
                                <x-icons.trash class="w-6 h-6"/>
                            </x-button>
                        </x-form>

                    </li>
                @endforeach
            </ul>
        </div>
    </x-container>

</x-layout.app>
