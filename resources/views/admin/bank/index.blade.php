@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/footable/footable.core.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/plugins/footable/footable.all.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.footable').footable();
        });

    </script>
@endpush

@section('page-heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Banks Account</h2>
            <span>Tihs list of bank account information for transfer method</span>
        </div>

        <div class="col-lg-2" style="padding-top: 35px;">

        </div>
    </div>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Banks Account</h5>
                        <div class="ibox-tools">
                            <a href="{{ route('admin.bank.add') }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil-square-o"></i> Add
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                            <tr>

                                <th width="45%" data-toggle="true">Bank Name</th>
                                <th>Short Name</th>
                                <th>Acount Number</th>
                                <th data-hide="all">Account Name</th>
                                <th data-hide="all">Branch</th>
                                <th data-hide="all">Status</th>
                                <th data-hide="all">Image</th>
                                <th>Code</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banks as $bank)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.bank.edit', [$bank->id, $bank->bank_code]) }}">
                                            {{ $bank->bank_name }}
                                        </a>
                                    </td>
                                    <td>{{ $bank->short_name }}</td>
                                    <td>{{ $bank->account_number }}</td>
                                    <td>{{ $bank->account_name }}</td>
                                    <td>{{ $bank->branch }}</td>
                                    <td>Active</td>
                                    <td><img src="{{ asset('storage/' . $bank->picture ) }}" height="60px"></td>
                                    <td>{{ $bank->bank_code }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
