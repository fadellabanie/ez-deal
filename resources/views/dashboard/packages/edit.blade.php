@extends('layouts.admin')

@section('title',__('Packages'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.packages.update :package='$package' />

    </div>
</div>

@endsection
