
<div id="edit-tag-{{ $tag->id }}" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label for="name" class="form-label">Category name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $tag->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
