@if(session('success_msg'))
        <div id="success_msg" class="alert alert-success">
            {{session('success_msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@if(session('error_msg'))
        <div id="error_msg" class="alert alert-danger">
            {{session('error_msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('status_msg'))
        <div id="status_msg" class="alert alert-warning">
            {{session('status_msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
