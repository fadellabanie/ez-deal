<div>
    @if (Request::segment(2) == 'notifications-captains')
    @include('livewire.notifications.captain-form')
    @else
    @include('livewire.notifications.form')
    @endif
    
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{__("Notification")}}
            </div>
        </div>
        <div class="card-body">
            <x-search></x-search>
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable_2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Content') }}</th>
                        {{-- <th>{{ __('Type') }}</th> --}}
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                    <tr>
                        <td>
                            {{$notification->id}}
                        </td>
                        <td>
                            <span class="label label-light-info label-inline mr-2 mb-2">
                                <span class="d-inline-block" data-toggle="tooltip">
                                    {{$notification->title}}
                                </span>
                            </span>
                        </td>
                        <td class="w-10%">
                            <span class="label label-light-dark label-inline mr-2 mb-2">
                                <span class="d-inline-block" data-toggle="tooltip">
                                    {{$notification->content}}
                                </span>
                            </span>
                        </td>
                        {{-- <td>
                            <span class="d-inline-block" data-toggle="tooltip">
                              
                                @if ($notification->type == 'passengers')
                                <span class="label label-lg label-light-info label-inline">{{ __('Passengers') }}</span>
                                @else
                                <span class="label label-lg label-light-primary label-inline">{{ __('Captains') }}</span>
                                @endif
                            </span>
                        </td> --}}
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$notifications->links('dashboard.partials.custom-pagination-links')}}
        </div>
    </div>
</div>
@section('scripts')

<script type="text/javascript">
    window.livewire.on('modelClose', () => {
        $('#modal').modal('hide');
    });   
   
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    }); 
    window.livewire.on('deleteModalClose', () => {
        $('#deleteModal').modal('hide');
    });
   
</script>
@endsection