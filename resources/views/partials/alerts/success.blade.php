@if(Session::has('msg'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Perfecto!</strong> {!!Session::get('msg')!!}
        </div>
    @endif