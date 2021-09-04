<!-- Confrim Delete Modal -->
<div class="modal fade" id="delete-tag-{{ $tag->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('categories.destroy', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Confirm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You are going to delete <strong>{{ $tag->name }}</strong> from tags, are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-trash"></i> Yes i'm sure</button>
                </div>
            </form>
        </div>
    </div>
</div>