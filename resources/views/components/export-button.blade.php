
<button href="{{route('admin.admins.create')}}" class="btn btn-sm btn-success" wire:click.prevent="export" wire:loading.attr="disabled"
wire:loading.class="spinner spinner-white spinner-left">
    <i class="fas fa-file-excel"></i>{{__("Export")}}</button>
