<x-layout.app>
    <x-container>

        <x-card title="Edit Link">

            <x-flashmessage/>

            <x-form :route="route('links.update', $link)" method="put" id="linksupdate">

                <x-input name="link" placeholder="Link" value="{{ old('link', $link->link) }}"/>
                <x-input name="name" placeholder="Name" value="{{old('name', $link->name)}}"/>

            </x-form>
            <x-slot:actions>

                <x-a href="{{ route('dashboard') }}">Cancel</x-a>
                <x-button type="submit" form="linksupdate">Save</x-button>


            </x-slot:actions>


        </x-card>
    </x-container>
</x-layout.app>
