@extends('layouts.master')
@section('title')Basic Elements @endsection
@section('content')
{{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') Forms @endslot
            @slot('title') Basic Elements @endslot
        @endcomponent
    @endsection
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Textual Inputs</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Text</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-search-input" class="col-md-2 col-form-label">Search</label>
                            <div class="col-md-10">
                                <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-url-input" class="col-md-2 col-form-label">URL</label>
                            <div class="col-md-10">
                                <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                            <div class="col-md-10">
                                <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" value="hunter2" id="example-password-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 row">
                            <label for="example-number-input" class="col-md-2 col-form-label">Number</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="42" id="example-number-input">
                            </div>
                        </div><!-- end row -->
                        <div class="mb-3 mb-lg-0 row">
                            <label for="example-datetime-local-input" class="col-md-2 col-form-label">Date and time</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3 mt-3 mt-xl-0">
                            <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2019-08-19" id="example-date-input">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3">
                            <label for="example-month-input" class="col-md-2 col-form-label">Month</label>
                            <div class="col-md-10">
                                <input class="form-control" type="month" value="2019-08" id="example-month-input">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3">
                            <label for="example-week-input" class="col-md-2 col-form-label">Week</label>
                            <div class="col-md-10">
                                <input class="form-control" type="week" value="2019-W33" id="example-week-input">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3">
                            <label for="example-time-input" class="col-md-2 col-form-label">Time</label>
                            <div class="col-md-10">
                                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3">
                            <label for="example-color-input" class="col-md-2 col-form-label">Color picker</label>
                            <div class="col-md-10">
                                <input type="color" class="form-control form-control-color w-100" id="example-color-input" value="#776acf" title="Choose your color">
                            </div>
                        </div><!-- end row -->
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Select</label>
                            <div class="col-md-10">
                                <select class="form-select">
                                    <option>Select</option>
                                    <option>Large select</option>
                                    <option>Small select</option>
                                </select>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <label for="exampleDataList" class="col-md-2 col-form-label">Datalists</label>
                            <div class="col-md-10">
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    <option value="San Francisco">
                                    <option value="New York">
                                    <option value="Seattle">
                                    <option value="Los Angeles">
                                    <option value="Chicago">
                                </datalist>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Form Layouts</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="formrow-firstname-input">First name</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Enter First Name">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Email</label>
                                    <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter E-mail">
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Password</label>
                                    <input type="password" class="form-control" id="formrow-password-input" placeholder="Enter Password">
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="form-group">
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                <label class="form-check-label" for="formrow-customCheck">Check me out</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form><!-- end form -->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Horizontal Form</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="horizontal-firstname-input" placeholder="Enter First Name">
                        </div>
                    </div><!-- end row -->
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="horizontal-email-input" placeholder="Enter E-mail">
                        </div>
                    </div><!-- end row -->
                    <div class="row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="horizontal-password-input" placeholder="ENter Password">
                        </div>
                    </div><!-- end row -->

                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="horizontal-customCheck">
                                <label class="form-check-label" for="horizontal-customCheck">Remember me</label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form><!-- end form -->
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<!-- End Form Layout -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title"> Inline Forms </h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form class="row gx-3 gy-2 align-items-center">
                    <div class="col-sm-5">
                        <label class="visually-hidden" for="specificSizeInputName">Name</label>
                        <input type="text" class="form-control" id="specificSizeInputName" placeholder="Enter Name">
                    </div>
                    <!-- end col -->
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                            <label class="form-check-label" for="autoSizingCheck2">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!-- end col -->
                </form><!-- end form -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- Start Form Sizing -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Sizing</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form>
                    <div class="mb-4">
                        <label class="form-label" for="default-input">Default input</label>
                        <input class="form-control" type="text" id="default-input" placeholder="Default input">
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="form-sm-input">Form Small input</label>
                        <input class="form-control form-control-sm" type="text" id="form-sm-input" placeholder=".form-control-sm">
                    </div>

                    <div class="mb-0">
                        <label class="form-label" for="form-lg-input">Form Large input</label>
                        <input class="form-control form-control-lg" type="text" id="form-lg-input" placeholder=".form-control-lg">
                    </div>

                </form><!-- end form -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card card-h-100">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Switches</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i>Switch Examples</h5>
                            <div class="form-check form-switch form-switch-md mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                            </div>

                            <div class="form-check form-switch form-switch-md mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            </div>

                            <div class="form-check form-switch form-switch-md mb-2">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                            </div>

                            <div class="form-check form-switch form-switch-md">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-6">
                        <div class="mt-4 mt-md-0">
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i>Switch Sizes</h5>

                            <div class="form-check form-switch mb-2" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizesm" checked>
                                <label class="form-check-label" for="customSwitchsizesm">Small Size Switch</label>
                            </div>

                            <div class="form-check form-switch form-switch-md mb-2" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizemd">
                                <label class="form-check-label" for="customSwitchsizemd">Medium Size Switch</label>
                            </div>

                            <div class="form-check form-switch form-switch-lg mb-0" dir="ltr">
                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked>
                                <label class="form-check-label" for="customSwitchsizelg">Large Size Switch</label>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body-->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
<!-- End Form Sizing -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Checkboxes</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Checkboxes</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="formCheck1">
                                <label class="form-check-label" for="formCheck1">
                                    Form Checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheck2" checked>
                                <label class="form-check-label" for="formCheck2">
                                    Form Checkbox checked
                                </label>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 ms-auto">
                        <div class="mt-md-0 mt-4">
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Checkboxes Right</h5>
                            <div>
                                <div class="form-check form-check-right mb-2">
                                    <input class="form-check-input" type="checkbox" id="formCheckRight1">
                                    <label class="form-check-label" for="formCheckRight1">
                                        Form Checkbox Right
                                    </label>
                                </div>
                            </div>
                            <div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" type="checkbox" id="formCheckRight2" checked>
                                    <label class="form-check-label" for="formCheckRight2">
                                        Form Checkbox Right checked
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Radio</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Radios</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios1" checked>
                                <label class="form-check-label" for="formRadios1">
                                    Form Radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formRadios" id="formRadios2">
                                <label class="form-check-label" for="formRadios2">
                                    Form Radio checked
                                </label>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-6 ms-auto">
                        <div class="mt-md-0 mt-4">
                            <h5 class="font-size-13 text-uppercase text-muted mb-4"><i class="mdi mdi-chevron-right text-primary me-1"></i> Form Radios Right</h5>
                            <div>
                                <div class="form-check form-check-right mb-2">
                                    <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight1" checked>
                                    <label class="form-check-label" for="formRadiosRight1">
                                        Form Radio Right
                                    </label>
                                </div>
                            </div>

                            <div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight2">
                                    <label class="form-check-label" for="formRadiosRight2">
                                        Form Radio Right checked
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Range Inputs</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div>
                    <h5 class="font-size-14">Example</h5>
                    <input type="range" class="form-range" id="formControlRange">
                </div>
                <div class="mt-4">
                    <h5 class="font-size-14">Disabled</h5>
                    <input type="range" class="form-range" id="disabledRange" disabled>
                </div>
                <div class="mt-4">
                    <h5 class="font-size-14">Custom Range</h5>
                    <input type="range" class="form-range" id="customRange1">
                    <input type="range" <input id="field-probability" type="range" min="1" max="100" name="probability" value="46" wfd-id="id12" style="background: linear-gradient(to right, rgb(50, 100, 254) 46%, rgb(204, 214, 255) 46%);"> min="0" max="5" id="customRange2">
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">File Browser</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Small file input example</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                </div>
                <div>
                    <label for="formFileLg" class="form-label">Large file input example</label>
                    <input class="form-control form-control-lg" id="formFileLg" type="file">
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Form Floationg</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h4 class="card-title">Select Floationg</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
                    <label for="floatingInputGrid">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelectGrid">Works with selects</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
