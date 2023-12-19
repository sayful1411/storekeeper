@extends('backend.layouts.dashboard')

@section('title', 'Home - Dashboard')

@section('content')

    <div class="row mb-3 pb-1">
        <div class="col-12">
            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                    <p class="text-muted mb-0">
                        Here's what's happening with your store today.
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- end row --}}

    <div class="row">
        <div class="col-xl-3 col-md-6">
            {{-- card --}}
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                Today Sale
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary">
                                <span class="counter-value" data-target="{{ $todayTotalAmount }}">{{ $todayTotalAmount }}</span> tk
                            </h4>
                        </div>
                        <div class="avatar-sm ">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            {{-- end card --}}
        </div>
        {{-- end col --}}

        <div class="col-xl-3 col-md-6">
            {{-- card --}}
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                Yesterday Sale
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary">
                                <span class="counter-value" data-target="{{ $yesterdayTotalAmount }}">{{ $yesterdayTotalAmount }}</span> tk
                            </h4>
                        </div>
                        <div class="avatar-sm ">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            {{-- end card --}}
        </div>
        {{-- end col --}}

        <div class="col-xl-3 col-md-6">
            {{-- card --}}
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                {{ \Carbon\Carbon::now()->format('F') }} Sale
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary">
                                <span class="counter-value" data-target="{{ $thisMonthTotalAmount }}">{{ $thisMonthTotalAmount }}</span> tk
                            </h4>
                        </div>
                        <div class="avatar-sm ">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            {{-- end card --}}
        </div>
        {{-- end col --}}

        <div class="col-xl-3 col-md-6">
            {{-- card --}}
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                {{ \Carbon\Carbon::now()->subMonth()->format('F') }} Sale
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary">
                                <span class="counter-value" data-target="{{ $lastMonthTotalAmount }}">{{ $lastMonthTotalAmount }}</span> tk
                            </h4>
                        </div>
                        <div class="avatar-sm ">
                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            {{-- end card --}}
        </div>
        {{-- end col --}}
    </div>
    {{-- end row --}}

@endsection
