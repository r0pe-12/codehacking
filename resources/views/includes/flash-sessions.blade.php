@if(session('user-created'))
    <div class="alert alert-success">
        {{ session('user-created') }}
    </div>
@elseif(session('user-updated'))
    <div class="alert alert-success">
        {{ session('user-updated') }}
    </div>
@elseif(session('user-deleted'))
    <div class="alert alert-success">
        {{ session('user-deleted') }}
    </div>
@endif
