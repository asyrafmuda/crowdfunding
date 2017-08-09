<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ Request::is('internal/dashboard') ? 'active' : '' }}">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('internal/dashboard') ? 'active' : ''}}">
                        <a href="{{ route('admin.dashboard') }}">Overview</a>
                    </li>

                </ul>
            </li>
            <li class="{{ Request::is('internal/campaigns/new') ||  Request::is('internal/campaigns/list') ||
                            Request::is('internal/campaigns/edit/list')? 'active' : '' }}">
                <a href="javascript::"><i class="fa fa-flask"></i> <span class="nav-label">Campaigns</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('internal/campaigns/new') ? 'active' : '' }}">
                        <a href="{{ route('admin.campaign.new') }}">Create New</a>
                    </li>
                    <li class="{{ Request::is('internal/campaigns/list') ? 'active' : '' }}">
                        <a href="{{ route('admin.campaign.list') }}">All Campaigns</a>
                    </li>
                    <li class="{{ Request::is('internal/campaigns/edit/list') ? 'active' : '' }}">
                        <a href="{{ route('admin.campaign.editList') }}">Edit Campaign</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Donations</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="graph_flot.html">Overview</a></li>
                    <li><a href="graph_flot.html">All Donation</a></li>
                    <li><a href="graph_morris.html">Donation Pending</a></li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Users </span><span class="label label-warning pull-right">16/24</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="mailbox.html">Create New</a></li>
                    <li><a href="mail_detail.html">All </a></li>
                    <li><a href="mail_compose.html">Compose email</a></li>
                    <li><a href="email_template.html">Email templates</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Withdraw</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="form_basic.html">Basic form</a></li>
                    <li><a href="form_advanced.html">Advanced Plugins</a></li>
                    <li><a href="form_wizard.html">Wizard</a></li>
                    <li><a href="form_file_upload.html">File Upload</a></li>
                    <li><a href="form_editors.html">Text Editor</a></li>
                    <li><a href="form_autocomplete.html">Autocomplete</a></li>
                    <li><a href="form_markdown.html">Markdown</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Blog</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="profile_2.html">Profile v.2</a></li>
                    <li><a href="contacts_2.html">Contacts v.2</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project detail</a></li>
                    <li><a href="activity_stream.html">Activity stream</a></li>
                    <li><a href="teams_board.html">Teams board</a></li>
                    <li><a href="social_feed.html">Social feed</a></li>
                    <li><a href="clients.html">Clients</a></li>
                    <li><a href="full_height.html">Outlook view</a></li>
                    <li><a href="vote_list.html">Vote list</a></li>
                    <li><a href="file_manager.html">File manager</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                    <li><a href="issue_tracker.html">Issue tracker</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="article.html">Article</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="pin_board.html">Pin board</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('internal/banks/list') || Request::is('internal/banks/add') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Banks</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('internal/banks/add') ? 'active' : '' }}"><a href="{{ route('admin.bank.add') }}">Add New Bank</a></li>
                    <li class="{{ Request::is('internal/banks/list') ? 'active' : ''}}"><a href="{{ route('admin.bank.list') }}">Banks Account</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Settings</span><span class="label label-info pull-right">NEW</span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="toastr_notifications.html">Notification</a></li>
                    <li><a href="nestable_list.html">Nestable list</a></li>
                    <li><a href="agile_board.html">Agile board</a></li>
                    <li><a href="timeline_2.html">Timeline v.2</a></li>
                    <li><a href="diff.html">Diff</a></li>
                    <li><a href="pdf_viewer.html">PDF viewer</a></li>
                    <li><a href="i18support.html">i18 support</a></li>
                    <li><a href="sweetalert.html">Sweet alert</a></li>
                    <li><a href="idle_timer.html">Idle timer</a></li>
                    <li><a href="truncate.html">Truncate</a></li>
                    <li><a href="password_meter.html">Password meter</a></li>
                    <li><a href="spinners.html">Spinners</a></li>
                    <li><a href="spinners_usage.html">Spinners usage</a></li>
                    <li><a href="tinycon.html">Live favicon</a></li>
                    <li><a href="google_maps.html">Google maps</a></li>
                    <li><a href="datamaps.html">Datamaps</a></li>
                    <li><a href="social_buttons.html">Social buttons</a></li>
                    <li><a href="code_editor.html">Code editor</a></li>
                    <li><a href="modal_window.html">Modal window</a></li>
                    <li><a href="clipboard.html">Clipboard</a></li>
                    <li><a href="text_spinners.html">Text spinners</a></li>
                    <li><a href="forum_main.html">Forum view</a></li>
                    <li><a href="validation.html">Validation</a></li>
                    <li><a href="tree_view.html">Tree view</a></li>
                    <li><a href="loading_buttons.html">Loading buttons</a></li>
                    <li><a href="chat_view.html">Chat view</a></li>
                    <li><a href="masonry.html">Masonry</a></li>
                    <li><a href="tour.html">Tour</a></li>
                </ul>
            </li>


        </ul>

    </div>
</nav>
