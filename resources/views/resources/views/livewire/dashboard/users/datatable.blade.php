<div>
    <x-alert class="alert-success"></x-alert>

    <!--begin::Advance Table Widget 10-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="py-5 border-0 card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">{{ __('Employees') }}</span>
                <span class="mt-3 text-muted font-weight-bold font-size-sm">{{ __('Show All') }}</span>
            </h3>
            <div class="d-flex align-items-center">
                @canany(['Export employee','Import employee'])
                <x-export field='{{$users->isEmpty()}}' export='Export employee' import='Import employee'>
                </x-export>
                @endcan
                <x-import-modal file='users.xlsx'></x-import-modal>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="py-0 card-body">
            <!--begin::Table-->
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_4">
                    <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 30px">#</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Name') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Email') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Phone') }}</th>
                            <th class="pl-0" style="min-width: 120px">{{ __('Type') }}</th>
                            <th class="pr-0 text-left" style="min-width: 160px">{{ __('Control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td class="py-6 pl-0">{{ $user->id }}</td>
                            <td class="pl-0">
                                <a href="{{ route('dashboard.users.edit', $user) }}"
                                    class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{ $user->name }}</a>
                            </td>
                            <td class="pl-0">
                                {{ $user->email }}
                            </td>
                            <td class="pl-0">
                                {{ $user->phone }}
                            </td>
                            <td class="pl-0 text-capitalize">
                                {{ __($user->type) }}
                            </td>
                            <td class="pr-0 text-left">
                                @can('Edit employee')
                                <x-edit-record-button href="{{ route('dashboard.users.edit', $user) }}" />
                                @endcan

                                @if(! $user->is_owner)
                                @can('Delete employee')
                                <x-delete-record-button wire:click="confirm({{ $user->id }})">
                                    </x-delete-modal>
                                    @endcan
                                    @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger font-size-lg">{{ __('No records found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Table-->

            {{ $users->links() }}
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 10-->
    <x-delete-modal></x-delete-modal>
</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    });
</script>
@endsection