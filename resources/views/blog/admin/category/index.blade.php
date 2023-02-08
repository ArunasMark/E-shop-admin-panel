@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Categories menu list @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories menu list @endslot
        @endcomponent
    </section>

Cat Menu

@endsection


