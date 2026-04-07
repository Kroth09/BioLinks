<div>

    <h1>Profile</h1>

    @if($message = session('message'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('profile') }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <input name="name" placeholder="Nome" value="{{old('name', $user->name)}}"/>
            @error('name')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <textarea name="description" placeholder="Breve resumo:">{{ old('description') }}</textarea>
            @error('description')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <br>


        <div>
            <span>biolinks.com.br/@</span>
            <textarea
            name="handler" placeholder="@seulink">{{old('handler', $user->handler)}}</textarea>
            @error('handler')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route("dashboard") }}">Cancelar</a>

        <button>Update</button>


    </form>
</div>
