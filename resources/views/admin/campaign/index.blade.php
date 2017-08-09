@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables/datatables.min.css') }}">
@endpush

@section('page-heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Campaigns</h2>
            <span>You can see all campaigns active, featured, funded, and trashed,</span>
        </div>

        <div class="col-lg-2" style="padding-top: 35px;">
            <a href="{{ route('admin.campaign.new') }}" class="btn btn-primary btn-sm">
                Create New
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="tabs-container">

            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#activeCampaigns"> Active Campaign </a></li>
                    <li class=""><a data-toggle="tab" href="#featuredCampaigns"><i class="fa fa-star"></i> Featured</a></li>
                    <li class=""><a data-toggle="tab" href="#fundedCampaigns"><i class="fa fa-check"></i> Funded</a></li>
                    <li class=""><a data-toggle="tab" href="#trashedCampaigns"><i class="fa fa-trash"></i> Trashed</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="activeCampaigns" class="tab-pane active">
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns as $campaign)
                                    <tr>
                                        <td>{{ $campaign->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaign.show', [$campaign->id, $campaign->slug]) }}">
                                                {{ $campaign->title }}
                                            </a>
                                            <p><small>{{ $campaign->blurb }}</small></p>
                                        </td>
                                        <td>Rp. {{ $campaign->funding_goal }}</td>
                                        <td>{{ $campaign->location }}</td>
                                        <td class="center"> {{ \Carbon\Carbon::parse($campaign->duration)->diffInDays() }} Days togo</td>
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
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="featuredCampaigns" class="tab-pane">
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
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($campaigns_featured as $campaign_featured)
                                   <tr>
                                       <td>{{ $campaign_featured->id }}</td>
                                       <td>
                                           <a href="{{ route('admin.campaign.show', [$campaign_featured->id, $campaign_featured->slug]) }}">
                                               {{ $campaign_featured->title }}
                                           </a>
                                           <p><small>{{ $campaign_featured->blurb }}</small></p>
                                       </td>
                                       <td>Rp. {{ $campaign_featured->funding_goal }}</td>
                                       <td>{{ $campaign_featured->location }}</td>
                                       <td class="center"> {{ \Carbon\Carbon::parse($campaign_featured->duration)->diffInDays() }} Days togo</td>
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
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="fundedCampaigns" class="tab-pane">
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns_funded as $campaign_funded)
                                    <tr>
                                        <td>{{ $campaign_funded->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaign.show', [$campaign_funded->id, $campaign_funded->slug]) }}">
                                                {{ $campaign_funded->title }}
                                            </a>
                                            <p><small>{{ $campaign_funded->blurb }}</small></p>
                                        </td>
                                        <td>Rp. {{ $campaign_funded->funding_goal }}</td>
                                        <td>{{ $campaign_funded->location }}</td>
                                        <td class="center"> {{ \Carbon\Carbon::parse($campaign_funded->duration)->diffInDays() }} Days togo</td>
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
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="trashedCampaigns" class="tab-pane">
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
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns_trashed as $campaign_trashed)
                                    <tr>
                                        <td>{{ $campaign_trashed->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.campaign.show', [$campaign_trashed->id, $campaign_trashed->slug]) }}">
                                                {{ $campaign_trashed->title }}
                                            </a>
                                            <p><small>{{ $campaign_trashed->blurb }}</small></p>
                                        </td>
                                        <td>Rp. {{ $campaign_trashed->funding_goal }}</td>
                                        <td>{{ $campaign_trashed->location }}</td>
                                        <td class="center"> {{ \Carbon\Carbon::parse($campaign_trashed->duration)->diffInDays() }} Days togo</td>
                                        <td>
                                            <a href="" class="btn btn-link btn-sm">
                                                <i class="fa fa-trash"></i> Delete
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
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
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