@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables/datatables.min.css') }}">
@endpush

@section('page-heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Campaigns List</h2>
            <span>You will direct to edit campaign action.</span>
        </div>

        <div class="col-lg-2">

        </div>
    </div>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Campaign Title</th>
                        <th>Funding Goal</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{ $campaign->id }}</td>
                            <td>
                                <a href="{{ route('admin.campaign.edit', [$campaign->id, $campaign->slug]) }}">
                                    {{ $campaign->title }}
                                </a>
                                <p><small>{{ $campaign->blurb }}</small></p>
                            </td>
                            <td>Rp. {{ $campaign->funding_goal }}</td>
                            <td>{{ $campaign->location }}</td>
                            <td class="center"> {{ \Carbon\Carbon::parse($campaign->duration)->diffInDays() }} Days togo</td>
                            <td>
                                <a href="{{ route('admin.campaign.edit', [$campaign->id, $campaign->slug]) }}"
                                class="btn btn-sm btn-link">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Campaign Title</th>
                        <th>Funding Goal</th>
                        <th>Location</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                fixedHeader: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Report Campaign Exel'},
                    {extend: 'pdf', title: 'Report Campaign PDF'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
@endpush