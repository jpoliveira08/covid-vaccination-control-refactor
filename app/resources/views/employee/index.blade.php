@extends('layout.layout')

@section('title')
    Employees
@endsection
@section('content')
    @section('page_title')
        Employees
    @endsection
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <x-employee.create-button/>
    <livewire:tables.employee-table/>
@endsection
