@extends('layouts.admin')

@section('title',__('Real Estate'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.real-estates.update :realEstate='$realEstate' />
    </div>
</div>

@endsection
