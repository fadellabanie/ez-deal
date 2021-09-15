@extends('layouts.admin')

@section('title',__('Static Pages'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        @livewire('dashboard.static-pages.store')
    </div>
</div>

@endsection
