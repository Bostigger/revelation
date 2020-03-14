@include('client.addons.dashboardheader')
        <main>
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>{{$page_title}}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($page_data as $key=>$data)
                                        <tr>
                                            <td>{{$data->last_name.' '.$data->first_name.' '.$data->middle_name}}</td>
                                            <td>{{$data->phone_number}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@include('client.addons.dashboardfooter')
