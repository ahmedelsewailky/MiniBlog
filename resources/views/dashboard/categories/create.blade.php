<div id="create-category" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Create new category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label for="name" class="form-label">Category name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Set the name of a new category">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Short category description ...">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
