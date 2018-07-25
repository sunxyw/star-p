<div id="message">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning" role="alert">
            <i class="fas fa-exclamation"></i>
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info"></i>
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-times"></i>
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>