@extends('layouts.app-light')


@section('content')

    <div class="card">
        <div class="card-block">
            <!--<h4 class="card-title">Tab with icon</h4>
            <h6 class="card-subtitle">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>-->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab" title="Event details"><span><i class="fa fa-list-alt"> Event Details</i></span></a> </li>
                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile8" role="tab" title="Guest"><span><i class="ti-user"> Guest List</i></span></a> </li>-->
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages8" role="tab" title="Report"><span><i class="fa fa-bullhorn"> Event Report</i></span></a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="home8" role="tabpanel">
                    <div class="card event-card ribbon-wrapper fish">
                        <div class="ribbon ribbon-default ribbon-bookmark">Ayo Weds Ayo</div>
                        <div class="panel panel-default">
                            <div class="row">
                                    <div class="ribbon-wrapper-right-bottom card panel-content col-md-9 ">
                                        <a href="{{ url('/edit-my-event') }}" class="ribbon ribbon-corner ribbon-default ribbon-right ribbon-bottom" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <p>Description: The magical couple of 2050 will be celegration their italian theme wedding at canada in lewisham shopping center </p>
                                        <p>Category: Wedding</p>
                                        <p>Date: 2050/05/17</p>
                                        <p>Time: 13:55</p>
                                        <p>Event type: Paid</p>
                                    </div>
                                    <img class="card-img-top img-responsive event-image panel-heading col-md-3 img-rounded" src="{{ url('assets/images/myimages/ayowedsayo.jpg')}}" alt="Card image cap">
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="tab-pane  p-20" id="profile8" role="tabpanel">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Guest List</h4>

                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-striped color-bordered-table danger-bordered-table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkbox" name="checkbox" value="checkbox"/></th>
                                        <th>Name</th>
                                        <th>Event Title</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="checkbox" name="checkbox" value="checkbox"/>
                                        </td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('/gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>2011/04/25</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-circle" data-container="body" title="No Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm btn-circle" data-container="body" title="In Transit" data-toggle="tooltip" data-placement="top"><i class="fa fa-cab"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-circle" data-container="body" title="Received GIft" data-toggle="tooltip" data-placement="top"><i class="fa fa-handshake-o"></i></a>
                                        </td>
                                        <td><a href="{{ url('gift-guest') }}" class="btn btn-danger waves-effect waves-light" data-container="body" title="Give Gift" data-toggle="tooltip" data-placement="top"><i class="fa fa-gift"></i></a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="tab-pane p-20" id="messages8" role="tabpanel">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Data Table</h4>
                            <h6 class="card-subtitle">Data table example</h6>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-striped color-bordered-table danger-bordered-table">
                                    <thead>
                                    <tr>
                                        <th>Event Title
                                        <th>Name</th>
                                        <th>Booked</th>
                                        <th>booked and watched</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check "></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check chk-col-light-green"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <th>harrison</th>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                        <td align="center"><i class="fa fa-check"></i></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="center" style="padding-bottom:1em;">
                <a href="{{ url('/my-event') }}" class="btn btn-inverse">Back</a>
                </div>
            </div>
        </div>
    </div>


@endsection