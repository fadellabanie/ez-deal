<!--(Begin) Modal Update Or Store (Begin)-->
<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{__("Create Role")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row validated">
                            <div class="col-lg-6">
                                <x-label>{{__("Name")}}</x-label>
                                <div class="col-12">
                                    <x-input wire:model.lazy="name" field='name' />
                                    <span class="form-text text-muted">{{__("Please enter name of Role")}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row validated ">

                            <div class="col-lg-12" wire:ignore>
                                <x-label>{{__("Permissions")}}</x-label>
                                <div class="col-lg-12">
                                    <select class="form-control select2 @error('permissionsId') is-invalid @enderror"
                                        id="permissionsIds" name="permissionsId" multiple="multiple" style="width: 800px;">
                                        @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" @if(is_array($oldPermissionsIds) &&
                                            in_array($permission->id,$oldPermissionsIds)) selected
                                            @endif>{{$permission->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-error field="permissionsId" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{__("Close")}}</button>

                    <button type="button" wire:click.prevent="{{ $editMode ? 'update' : 'store'}}"
                        class="btn btn-primary font-weight-bold" data-dismiss="modal">{{__("Save")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--(End) Modal Update Or Store (End)-->