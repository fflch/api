@if($errors->has($field))
    @foreach($errors->get($field) as $error)
        <div class="validation-error">{{ $error }}</div>
    @endforeach
@endif