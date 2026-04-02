<div>
    <h1>Login</h1>

    <form action="/login" method="post">
        @csrf

        <input name="email" placeholder="Email" value="{{old('email')}}"/>
        <input name="password" placeholder="Senha"/>

        <button>Logar</button>


    </form>
</div>
