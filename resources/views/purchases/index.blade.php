@extends('layouts.app')

@section('content')
<div class="container" id="purchases">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Manage Purchases</div>

                <div class="card-body">
                    <x-alert />

                    <div class="pb-3 d-flex justify-content-between">
                        <div class="d-flex">
                            <select class="border-dark form-select w-auto" id="series_select">
                                <option selected disabled>Select Series</option>

                                @foreach ($series as $data)
                                <option value="{{ $data->id }}">{{ $data->series_description }}</option>
                                @endforeach
                            </select>

                            <div class="btn-group px-3" role="group">
                                <a class="btn btn-outline-success" id="download_btn">
                                    Download
                                </a>
                                <button id="fork_btn" type="button" class="btn btn-outline-success"
                                    data-bs-toggle="modal" data-bs-target="#series_fork_popup">Fork</button>
                                <button id="add_purchase_btn" type="button" class="btn btn-success"
                                    data-bs-toggle="modal" data-bs-target="#add_purchase_popup">
                                    <!-- <i data-feather="plus"></i> -->
                                    Add Purchase
                                </button>
                            </div>
                        </div>
                        <!-- <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchase_requests_popup">Requests</button> 
                        </div>-->
                        <div class="input-group w-auto">
                            <button class="btn btn-outline-success fw-bold rounded-circle border-2" type="button"
                                id="dollar_rate_btn" data-bs-toggle="modal"
                                data-bs-target="#dollar_rate_popup">$</button>
                        </div>
                    </div>

                    <x-table :id="'purchases_table'">
                        <thead>
                            <tr>
                                <th class="text-center fw-bold">Action</th>
                                <th class="text-center fw-bold">Dept.</th>
                                <th class="text-center fw-bold">No.</th>
                                <th class="text-center fw-bold">Description</th>
                                <th class="text-center fw-bold">Group</th>
                                <th class="text-center fw-bold">Account</th>
                                <th class="text-center fw-bold">Dollar Rate</th>
                                <th class="text-center fw-bold">Budget - PHP</th>
                                <th class="text-center fw-bold">Budget - USD</th>
                                <th class="text-center fw-bold">Fiscal</th>
                                <th class="text-center fw-bold">Series</th>
                                <th class="text-center fw-bold">Status</th>
                                <th class="text-center fw-bold">Notes</th>
                                <th class="text-center fw-bold">Last Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $index => $purchase)
                            <x-popup :id="'edit_purchase_popup_' . $purchase->id" :title="'Edit Purchase Info'"
                                :size="'lg'" :button="'Update'" :dnone="false"
                                :post="'update_purchase_fields' . '_' . $purchase->id">
                                @include('purchases.partials.update-purchase')
                            </x-popup>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</div>

<x-popup :id="'add_purchase_popup'" :title="'Add Purchase Info'" :size="'lg'" :button="'Save'" :dnone="false"
    :post="'add_purchase_fields'">
    @include('purchases.partials.add-purchase')
</x-popup>

<x-popup :id="'purchase_requests_popup'" :title="'Purchase Requests'" :size="'xl'" :dnone="true" :button="''"
    :post="''">
    {{--
    <x-tickets-table :tickets="$tickets" /> --}}
</x-popup>

<x-popup :id="'dollar_rate_popup'" :title="'Change Dollar to Peso Rate'" :size="'lg'" :button="'Save'" :dnone="false"
    :post="'dollar_rate_fields'">
    @include('purchases.partials.add-dollar-rate')
</x-popup>

{{-- @foreach($tickets as $ticket) --}}
{{--
<x-tickets-popup :tickets="$tickets" :series="null" /> --}}
{{-- @endforeach --}}

<script src="{{ asset('js/datatable_overrides.js') }}"></script>
<script src="{{ asset('js/purchase_actions.js') }}"></script>
@endSection