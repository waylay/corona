@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Welcome, {!! auth()->user()->name !!}!</div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('status') }}
                </div>
            @endif

            <table id="entries" class="display cell-border stripe compact responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-filter">ID</th>
                    <th>Signed Up</th>
                    <th class="text-filter">Name</th>
                    <th class="text-filter">Email</th>
                    <th class="text-filter">Phone</th>
                    <th class="text-filter">Province</th>
                    <th>Birthday</th>
                    <th>Language</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="id-text-filter">ID</th>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Province</th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
