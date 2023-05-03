@extends('layouts.master')
@section('title')Cards @endsection
@section('content')

{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') UI Elements @endslot
            @slot('title') Cards @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-md-6 col-xl-3">
        <!-- Simple card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-1.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-2">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Button</a>
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-2.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-2">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-3.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">Card title</h4>
                <h6 class="card-subtitle font-14 text-muted">Support card subtitle</h6>
            </div>
            <img class="img-fluid" src="{{URL::asset('assets/images/small/img-4.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Using Grid Markup</h5>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <h3 class="card-title mb-1">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="card card-body">
                    <h3 class="card-title mb-1">Special title treatment</h3>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Text Alignment</h5>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-body">
                    <h4 class="card-title mb-1">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4 ">
                <div class="card card-body text-center">
                    <h4 class="card-title mb-1">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card card-body text-end">
                    <h4 class="card-title mb-1">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional
                        content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Header and Footer</h5>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <h4 class="card-header">Featured</h4>
                    <div class="card-body">
                        <h4 class="card-title mb-1">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Featured</div>
                    <div class="card-body">
                        <h4 class="card-title mb-1">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>
                    </div>
                    <div class="card-footer text-muted">2 days ago</div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Quote
                    </div>
                    <div class="card-body">
                        <blockquote class="card-blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                erat a ante.</p>
                            <footer class="blockquote-footer font-size-12 mt-0">
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Basic Card</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Nemo enim ipsam voluptatem quia voluptas site that aspernatur aut odit aut fugit sed quia consequunture magni that is dolores qui ratione voluptateme sequiit nesciunte eque porro quisquam.</p>
                <p class="text-muted mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">Card Sub Title</h4>
                <p class="card-text text-muted mb-0 text-muted">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-body">
                <p class="text-muted mb-0">Nemo enim ipsam voluptatem quia voluptas site that aspernatur aut odit aut fugit sed quia consequunture magni that is dolores qui ratione voluptateme sequiit nesciunte eque porroquaerat that dolores eos qui voluptatem.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"><i class="mdi mdi-emoticon-wink-outline me-1"></i> Icon In Heading</h4>
            </div>
            <div class="card-body">
                <p class="text-muted mb-0">Nemo enim ipsam voluptatem quia voluptas site that aspernatur aut odit aut voluptas site that aspernatur aut odit aut fugit sed quia consequunture magni that is dolores fugit sed quia quaerat that dolores eos qui voluptatem.</p>
            </div>
            <div class="card-footer">
                <p class="text-muted mb-0">Card Footer</p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Image Caps & Overlays</h5>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-6.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                    <img class="card-img-bottom img-fluid" src="{{URL::asset('assets/images/small/img-7.jpg')}}" alt="Card image cap">
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img img-fluid" src="{{URL::asset('assets/images/small/img-1.jpg')}}" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title text-white mb-1">Card title</h4>
                        <p class="card-text text-light">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                        <p class="card-text">
                            <small class="text-white">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Horizontal Card</h5>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-4">
                            <img class="card-img img-fluid" src="{{URL::asset('assets/images/small/img-2.jpg')}}" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mb-1">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img class="card-img img-fluid" src="{{URL::asset('assets/images/small/img-3.jpg')}}" alt="Card image">
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Background Color</h5>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-primary text-white-50">
                    <h6 class="card-header bg-primary text-white">Primary Card</h6>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card bg-success text-white-50">
                    <h6 class="card-header bg-success text-white">Success Card</h6>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card bg-info text-white-50">
                    <h6 class="card-header bg-info text-white">Info Card</h6>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card bg-warning text-white-50">
            <h6 class="card-header bg-warning text-white">Warning Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card bg-danger text-white-50">
            <h6 class="card-header bg-danger text-white">Danger Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card bg-dark text-white-50">
            <h6 class="card-header bg-dark text-white">Dark Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card bg-secondary text-white-50">
            <h6 class="card-header bg-secondary text-white">Secondary Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card bg-purple text-white-50">
            <h6 class="card-header bg-purple text-white">Purple Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card bg-light">
            <h6 class="card-header bg-light">Light Card</h6>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Border Color</h5>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h6 class="my-0 text-primary">Primary Outline Card</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card border border-success">
                    <div class="card-header bg-transparent border-success">
                        <h6 class="my-0 text-success">Success Outline Card</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card border border-info">
                    <div class="card-header bg-transparent border-info">
                        <h6 class="my-0 text-info">Info Outline Card</h6>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card border border-warning">
            <div class="card-header bg-transparent border-warning">
                <h6 class="my-0 text-warning">Warning Outline Card</h6>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-1">card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card border border-danger">
            <div class="card-header bg-transparent border-danger">
                <h6 class="my-0 text-danger">Danger Outline Card</h6>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-1">card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card border border-dark">
            <div class="card-header bg-transparent border-dark">
                <h6 class="my-0 text-dark">Dark Outline Card</h6>
            </div>
            <div class="card-body">
                <h5 class="card-title mb-1">card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-4">
        <div class="card border border-secondary">
            <div class="card-header bg-transparent border-secondary">
                <h6 class="my-0 text-secondary">Secondary Outline Card</h6>
            </div>
            <div class="card-body">
                <h6 class="card-title mb-1">card title</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card border border-purple">
            <div class="card-header bg-transparent border-purple">
                <h6 class="my-0 text-purple">Purple Outline Card</h6>
            </div>
            <div class="card-body">
                <h6 class="card-title mb-1">card title</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
    <div class="col-lg-4">
        <div class="card border border-light">
            <div class="card-header bg-transparent border-light">
                <h6 class="my-0">Light Outline Card</h6>
            </div>
            <div class="card-body">
                <h6 class="card-title mb-1">card title</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Card Groups</h5>
        </div>
        <div class="card-deck-wrapper">
            <div class="card-group">
                <div class="card mb-4">
                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-4.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Card title</h4>
                        <p class="card-text">This is a longer card with supporting text below as
                            a natural lead-in to additional content. This content is a little
                            bit longer.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div><!-- end card -->
                <div class="card mb-4">
                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-5.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Card title</h4>
                        <p class="card-text">This card has supporting text below as a natural
                            lead-in to additional content.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div><!-- end card -->
                <div class="card mb-4">
                    <img class="card-img-top img-fluid" src="{{URL::asset('assets/images/small/img-6.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Card title</h4>
                        <p class="card-text">This is a wider card with supporting text below as
                            a natural lead-in to additional content. This card has even longer
                            content than the first to show that equal height action.</p>
                        <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </p>
                    </div>
                </div><!-- end card -->
            </div><!-- end card group-->
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <h5 class="mb-0 pb-1 text-decoration-underline">Cards Masonry</h5>
        </div>
        <div class="row" data-masonry='{"percentPosition": true }'>
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <img src="{{URL::asset('assets/images/small/img-3.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Card title that wraps to a new line</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <img src="{{URL::asset('assets/images/small/img-5.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <img src="{{URL::asset('assets/images/small/img-7.jpg')}}" class="card-img-top" alt="...">
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card p-3 text-end">
                    <blockquote class="card-blockquote  mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer font-size-12 m-0">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="card-blockquote mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer font-size-12 m-0">
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card bg-primary text-white text-center p-3">
                    <blockquote class="card-blockquote m-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer class="blockquote-footer text-white font-size-12 mt-0 mb-0">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Card title</h5>
                        <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-sm-6 col-lg-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title mb-1">Card title</h5>
                        <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
