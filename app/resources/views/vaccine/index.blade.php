@extends('layout.layout')

@section('title')
    Vaccines
@endsection
@section('content')
    @section('page_title')
        Vaccines
    @endsection
        <x-vaccine.create-button/>

        <x-vaccine.modal>
            <x-vaccine.form/>
        </x-vaccine.modal>

        <livewire:tables.vaccine-table/>
@endsection
@push('scripts')
    @vite('resources/js/vaccine/index.js')
@endpush


