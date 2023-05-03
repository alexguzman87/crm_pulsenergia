@extends('layouts.master')
@section('title')Images @endsection
@section('content')

    {{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') UI Elements @endslot
            @slot('title') Images @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Image Thumbnails</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img class="img-thumbnail" alt="200x200" width="200" src="{{URL::asset('assets/images/small/img-3.jpg')}}" data-holder-rendered="true">
                        <p class="mt-2 mb-lg-0"><code>.img-thumbnail</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 mt-md-0">
                            <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="{{URL::asset('assets/images/users/avatar-3.jpg')}}" data-holder-rendered="true">
                            <p class="mt-2 mb-lg-0"><code>.img-thumbnail</code></p>
                        </div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Image Rounded & Circle</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img class="rounded mr-2" alt="200x200" width="200" src="{{URL::asset('assets/images/small/img-4.jpg')}}" data-holder-rendered="true">
                        <p class="mt-2 mb-lg-0"><code>.rounded</code></p>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 mt-md-0">
                            <img class="rounded-circle avatar-xl" alt="200x200" src="{{URL::asset('assets/images/users/avatar-4.jpg')}}" data-holder-rendered="true">
                            <p class="mt-2 mb-lg-0"><code>.rounded-circle</code></p>
                        </div>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Rounded Image Sizes</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="rounded avatar-xs">
                            <p class="mt-2 mb-lg-0"><code>.avatar-xs</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-4.jpg')}}" alt="" class="rounded avatar-sm">
                            <p class="mt-2  mb-lg-0"><code>.avatar-sm</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-5.jpg')}}" alt="" class="rounded avatar">
                            <p class="mt-2 mb-lg-0"><code>.avatar</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="rounded avatar-md">
                            <p class="mt-2 mb-lg-0"><code>.avatar-md</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-8.jpg')}}" alt="" class="rounded avatar-lg">
                            <p class="mt-2 mb-lg-0"><code>.avatar-lg</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/small/img-2.jpg')}}" alt="" class="rounded avatar-xl">
                            <p class="mt-2 mb-lg-0"><code>.avatar-xl</code></p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Rounded Circle Image Sizes</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="rounded-circle avatar-xs">
                            <p class="mt-2 mb-lg-0"><code>.avatar-xs</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-4.jpg')}}" alt="" class="rounded-circle avatar-sm">
                            <p class="mt-2  mb-lg-0"><code>.avatar-sm</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-5.jpg')}}" alt="" class="rounded-circle avatar">
                            <p class="mt-2 mb-lg-0"><code>.avatar</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="rounded-circle avatar-md">
                            <p class="mt-2 mb-lg-0"><code>.avatar-md</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-8.jpg')}}" alt="" class="rounded-circle avatar-lg">
                            <p class="mt-2 mb-lg-0"><code>.avatar-lg</code></p>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-2">
                        <div>
                            <img src="{{URL::asset('assets/images/users/avatar-10.jp')}}g" alt="" class="rounded-circle avatar-xl">
                            <p class="mt-2 mb-lg-0"><code>.avatar-xl</code></p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Responsive Images</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="">
                    <img src="{{URL::asset('assets/images/small/img-2.jpg')}}" class="img-fluid" alt="Responsive image">
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Media Object Default</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img src="{{URL::asset('assets/images/users/avatar-10.jp')}}g" class="avatar-lg img-fluid" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        This is some content from a media component. You can replace this with any content and adjust it as needed.
                    </div>
                </div>
            </div><!-- card body -->
        </div><!-- card -->

        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Media Object Center</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{URL::asset('assets/images/users/avatar-10.jp')}}g" class="avatar-lg img-fluid" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        This is some content from a media component. You can replace this with any content and adjust it as needed.
                    </div>
                </div>
            </div><!-- card body -->
        </div><!-- card -->
    </div><!-- col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Media Object Bottom</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="d-flex align-items-end">
                    <div class="flex-shrink-0">
                        <img src="{{URL::asset('assets/images/users/avatar-10.jp')}}g" class="avatar-lg img-fluid" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        This is some content from a media component. You can replace this with any content and adjust it as needed.
                    </div>
                </div>
            </div><!-- card body -->
        </div><!-- card -->
    </div><!-- col -->
</div> <!-- row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
