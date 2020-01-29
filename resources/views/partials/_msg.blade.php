@if(session('success_msg'))
        <div class="alert alert-success">
            {{session('success_msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif

@if(session('error_msg'))
        <div class="alert alert-danger">
            {{session('error_msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif