@if($errors->any())
    <div class="alert alert-danger">
     Hay algun problema en el formulario<br />
     <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif