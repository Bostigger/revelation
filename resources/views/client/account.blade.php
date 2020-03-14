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
                                    <th>s/n</th>
                                    <th>Bank Name</th>
                                    <th>Bank Branch</th>
                                    <th>Account Name</th>
                                    <th>Account Nummber</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($page_data as $key=>$data)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->bank_name}}</td>
                                            <td>{{$data->bank_branch}}</td>
                                            <td>{{$data->account_name}}</td>
                                            <td>{{$data->account_number}}</td>
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
