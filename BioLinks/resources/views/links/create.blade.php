<x-layout.app>

    <x-container>

        <x-card title="Add links">

            <x-flashmessage/>
            <x-form :route="route('links.create')" method="post" id="linkscreate">

                <x-input name="link" placeholder="Your Link" value="{{old('link')}}"/>

                <x-input name="name" placeholder="Name" value="{{old('name')}}"/>

            </x-form>

            <x-slot:actions>
                <x-a href="{{ route('dashboard') }}">Cancel</x-a>
                <x-button type="submit" form="linkscreate">Save</x-button>
            </x-slot:actions>

        </x-card>
    </x-container>

</x-layout.app>
