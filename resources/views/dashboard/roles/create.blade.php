<!-- Create new role modal -->
<div class="modal fade" id="create-role">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create new role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="rolename" class="form-label">Role name</label>
                        <input id="rolename" class="form-control" type="text" name="rolename" placeholder="Role name">
                    </div>

                    <div class="form-group mb-4">
                        <label for="permissions" class="form-label">Permissions</label>
                        <div class="row">
                            @foreach ($permissions as $per)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $per->id }}"
                                        id="permission-{{ $per->id }}">
                                    <label class="form-check-label" for="permission-{{ $per->id }}" style="cursor: pointer">
                                        {{ Str::ucfirst($per->name) }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
