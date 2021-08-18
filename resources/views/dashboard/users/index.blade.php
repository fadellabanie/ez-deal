@extends('layouts.admin')
@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
            </h1>
        </div>
        <div class="d-flex align-items-center py-1">
            <div class="me-4">
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                    id="kt_menu_610d480c9e86f">
                    <div class="separator border-gray-200"></div>
                </div>
            </div>
            <a href="#" class="btn btn-sm btn-primary" data-bs-target="#kt_modal_create_app"
                id="kt_toolbar_primary_button">Create</a>
        </div>
    </div>
</div>

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">


    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
@endsection

@section('scripts')
        
<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    });
</script>
@endsection