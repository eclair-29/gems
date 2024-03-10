@extends('layouts.app')

@section('content')
<div class="container" id="purchases">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Manage Purchases</div>

                <div class="card-body">
                    <x-alert />

                    <div class="pb-3 d-flex justify-content-end">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchase_requests_popup">Requests</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#add_purchase_popup">
                                <!-- <i data-feather="plus"></i> -->
                                Add Purchase
                            </button>
                        </div>
                    </div>

                    <x-table :id="'purchases_table'">
                        <thead>
                            <tr>
                                <th class="text-center">Action</th>
                                <th class="text-center">No.</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Group</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">PHP Est. Expense </th>
                                <th class="text-center">USD Est. Expense</th>
                                <th class="text-center">Notes</th>
                                <th class="text-center">Last Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $index => $purchase)
                            <x-popup :id="'edit_purchase_popup_' . $purchase->id" :title="'Edit Purchase Info'"
                                :size="'lg'" :button="'Update'" :dnone="false"
                                :post="'update_purchase_fields' . '_' . $purchase->id">
                                {{-- @include('publisher.partials.update-purchase') --}}
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
    {{-- @include('publisher.partials.add-purchase') --}}
</x-popup>

<x-popup :id="'purchase_requests_popup'" :title="'Purchase Requests'" :size="'xl'" :dnone="true" :button="''"
    :post="''">
    {{--
    <x-tickets-table :tickets="$tickets" /> --}}
</x-popup>

{{-- @foreach($tickets as $ticket) --}}
{{--
<x-tickets-popup :tickets="$tickets" :series="null" /> --}}
{{-- @endforeach --}}

<script src="{{ asset('js/datatable_overrides.js') }}"></script>
<script src="{{ asset('js/purchase_actions.js') }}"></script>
@endSection