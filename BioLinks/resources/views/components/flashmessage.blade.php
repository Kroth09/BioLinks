@if($message = session()->get('message'))
    <div>{{ $message }}</div>
@endif
