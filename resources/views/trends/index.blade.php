@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Trends</div>

                <div class="card-body">
                    <x-alert />

                    <div class="pb-3 d-flex justify-content-between">
                        <div class="d-flex">
                            <select class="border-dark form-select w-auto" id="fiscal_select">
                                <option selected disabled>Select Fiscal Period</option>

                                @foreach ($fiscals as $fiscal)
                                <option value="{{ $fiscal->fiscal }}">{{ $fiscal->fiscal_description }}</option>
                                @endforeach
                            </select>

                            <div class="btn-group px-3" role="group">
                                <a class="btn btn-outline-success" id="download_worksheet">
                                    Download
                                </a>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#add_purchase_popup">
                                    <!-- <i data-feather="plus"></i> -->
                                    Publish
                                </button>
                            </div>
                        </div>
                        <!-- <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchase_requests_popup">Requests</button> 
                        </div>-->
                    </div>

                    <canvas id="fiscal_trend_actual"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/libs/chart.utils.js') }}"></script>
<script src="{{ asset('js/libs/chart.js') }}"></script>
<script src="{{ asset('js/libs/chart.datalabels.js') }}"></script>
<script src="{{ asset('js/trends.js') }}"></script>
@endSection