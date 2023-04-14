<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0" <h5 class="modal-title" id="alertModalLabel">Messages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (is_array(session('error')))
                    @foreach (session('error') as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @else
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>


@if (session('success') || session('error'))
    <script>
        $(document).ready(function() {
            $('#alertModal').modal('show');
        });
    </script>
@endif
