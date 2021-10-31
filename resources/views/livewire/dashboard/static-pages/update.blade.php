<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true"
            aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__("Update Static Pages")}}</h3>
            </div>
        </div>
        <div id="kt_account_profile_details" class="collapse show">
            <form class="form">
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Title")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <x-input type="text" field="staticPage.ar_title" wire:model="staticPage.ar_title"
                                        placeholder="Arabic title" />
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <x-input type="text" field="staticPage.en_title" wire:model="staticPage.en_title"
                                        placeholder="English title" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("Arabic Description")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row" wire:ignore>
                                    <textarea name="ar_description" id="ar_description" data-ar_description="@this">
                                        {{ $ar_description }}
                                    </textarea>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label class="required">{{__("English Description")}}</x-label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row" wire:ignore>
                                    <textarea name="en_description" id="en_description" data-en_description="@this">
                                        {{ $en_description }}
                                    </textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Input group-->


                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <x-label>
                            <span class="required">{{__("Type")}}</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title="Phone number must be active"></i>
                        </x-label>
                        <div class="col-lg-8 fv-row">
                            <div wire:ignore>
                                <select wire:model="staticPage.type" data-control="type" id="type" name="type"
                                    class="form-select form-select-solid form-select-lg fw-bold">
                                    <option>{{__("Select...")}}</option>
                                    <option value="privacy-policy">{{__("Privacy Policy")}}</option>
                                    <option value="terms-and-conditions">{{__("Terms And Conditions")}}</option>
                                    <option value="before-create">{{__("Terms And Conditions befor create")}}</option>
                                </select>
                            </div>
                            <x-error field="staticPage.type" />
                        </div>
                    </div>
                    <!--end::Input group-->

                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{route('admin.static-pages.index')}}"
                        class="btn btn-light btn-active-light-primary me-2">{{__("Back")}}</a>
                    <button id="submit" type="button" class="btn btn-primary" wire:click.prevent="submit()"
                        wire:loading.attr="disabled"
                        wire:loading.class="spinner spinner-white spinner-left">{{__("Save")}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')

<script src="{{asset('dashboard/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/custom/ckeditor/ckeditor-inline.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js')}}"></script>
<script src="{{asset('dashboard/assets/plugins/custom/ckeditor/ckeditor-document.bundle.js')}}"></script>


<script>
    ClassicEditor
    .create(document.querySelector('#en_description'))
    .then(editor => {
        document.querySelector('#submit').addEventListener('click',() => {
            let en_description = $('#en_description').data('en_description');
            @this.en_description = editor.getData();
            //eval('en_description').set('en_description',editor.getData());
        });
        
    })
  
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#ar_description'))
    .then(editor => {
        document.querySelector('#submit').addEventListener('click',()=>{
            let ar_description = $('#ar_description').data('ar_description');
            @this.ar_description = editor.getData();
            //eval('ar_description').set('ar_description',editor.getData());
        });
    })
    .catch(error => {
        console.error(error);
    });
 

</script>
@endsection