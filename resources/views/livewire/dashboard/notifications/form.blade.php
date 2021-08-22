<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{__("Send notification Passenger")}}</h3>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <x-label>{{__("Title")}}</x-label>
                            <x-input wire:model.lazy="title" type="text" field="title"
                                placeholder="{{__('Enter Title')}}">
                            </x-input>
                        </div>
                        <div class="col-lg-8">
                            <x-label>{{__("Content")}}</x-label>
                            <x-input wire:model.lazy="content" type="text" field="content"
                                placeholder="{{__('Enter Content')}}"></x-input>
                        </div>
                    </div>
              
                    <div class="form-group row" wire:ignore>
                        
                        <div class="col-lg-6">
                            <label class="col-form-label col-lg-3 col-sm-12">{{ __('Passengers') }}</label>

                            <select class="form-control select2 @error('user_ids') is-invalid @enderror"
                                id="kt_select2_4" name="user_ids" multiple="multiple">
                                @foreach ($passengers as $passenger)
                                <option value="{{$passenger->device_token}}">{{$passenger->full_name}}--{{$passenger->mobile}}
                                </option>
                                @endforeach
                            </select>
                            <x-error field="user_ids" />
                        </div>
                     
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-primary mr-2"
                                wire:click.prevent="sendNotification">{{__("Save")}}</button>
                        </div>
                        <div class="col-lg-6 text-lg-right">
                            <button type="reset" class="btn btn-danger">{{__("Delete")}}</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Card-->

@section('scripts')
<script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
                $('#kt_select2_4').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.user_ids = $(this).val();
                });

                $('#kt_select2_1').select2({
                    placeholder: '',
                }).on('change', function () {
                    @this.user_ids = $(this).val();
                });
            });

    window.livewire.on('reloadData', () => {
            $('.select2').selectpicker(["refresh"]);
        });

    //   $('#captainsSelect').hide();
//     $('#passengersSelect').hide();
    $(".select2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
   

    
</script>

@endsection