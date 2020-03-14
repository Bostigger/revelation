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
                                    <th>Name</th>
                                    <th>Room No</th>
                                    <th>Course Year</th>
                                    <th>Votes</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@include('client.addons.dashboardfooter')
