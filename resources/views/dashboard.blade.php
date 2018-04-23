@extends('layouts.app')

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">{!! trans('text.welcome',['name' => auth()->user()->name ]) !!}</div>
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
                    <th class="text-filter">SubmissionDate</th>
                    <th class="text-filter">FirstName</th>
                    <th class="text-filter">LastName</th>
                    <th class="invisible">Phone</th>
                    <th class="invisible">Email</th>
                    <th class="invisible">Address1</th>
                    <th class="invisible">Address2</th>
                    <th class="invisible">City</th>
                    <th class="invisible">Province</th>
                    <th class="invisible">PostalCode</th>
                    <th class="text-filter">IMEI</th>
                    <th class="text-filter">PurchasedFrom</th>
                    <th class="invisible">Language</th>
                    <th class="invisible">Receipt</th>
                    <th class="select-filter">Emailed</th>
                    <th class="select-filter">Validated</th>
                    <th class="select-filter">Shipped</th>
                    <th class="select-filter">Notes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="id-text-filter">ID</th>
                    <th>SubmissionDate</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>PostalCode</th>
                    <th>IMEI</th>
                    <th>PurchasedFrom</th>
                    <th>Language</th>
                    <th>Receipt</th>
                    <th>Emailed</th>
                    <th>Validated</th>
                    <th>Shipped</th>
                    <th>Notes</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
