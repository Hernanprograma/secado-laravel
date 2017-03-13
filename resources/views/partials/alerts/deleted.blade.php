@if(Session::has('deleted'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Borrado!</strong> {!!Session::get('deleted')!!}
        </div>
    @endif