@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Trends</div>

                <div class="card-body">
                    <x-alert />
                    {{ __('Trends') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endSection