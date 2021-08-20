<button type="button" class="mr-2 btn btn-success btn-xl" wire:click.prevent="export" wire:loading.attr="disabled"
    wire:loading.class="spinner spinner-white spinner-left" style="
    width: 88px;
"><i class="fas fa-file-excel"></i> {{ __('Export') }}</button>