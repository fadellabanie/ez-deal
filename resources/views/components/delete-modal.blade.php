<div wire:ignore.self class="modal fade deleteModal" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModallLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __("Confirm Delete") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                {{ __("Are you sure you want to delete this item ?") }}
            </div>
            <div class="modal-footer">
                <a wire:click="destroy()" class="mr-2 btn btn-danger font-weight-bold"  data-dismiss="modal">{{ __("Delete") }}</a>
                <button type="button" class="btn btn-dark font-weight-bold" data-dismiss="modal">{{ __("Close") }}</button>
            </div>
        </div>
    </div>
</div>