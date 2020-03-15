@include('client.addons.dashboardheader')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{url('client/accounts/add')}}">
                            {{ csrf_field() }}

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="hidden" name="client_id" value="{{ session()->get('client_id') }}">
                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Bank Name</label><input class="form-control py-4" name="bank_name" id="inputFirstName" type="text" placeholder="Enter Bank name" required/></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Bank Branch</label><input class="form-control py-4" name="bank_branch" id="inputLastName" type="text" placeholder="Enter Bank Branch" required/></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Name on Account</label><input class="form-control py-4" id="inputEmailAddress" name="account_name" type="text" aria-describedby="emailHelp" placeholder="Enter Name on Account" required/></div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Account Number</label><input class="form-control py-4" id="inputPassword" type="text" name="account_number" placeholder="Enter Account Number" required/></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputConfirmPassword">Select Next of Kin</label>
                                        <select class="form-control" id="inputConfirmPassword" name="next_of_kin_id" type="text">
                                            <option value="" selected="selected">Select Next of Kin</option>
                                            @foreach($page_data as $nok)
                                                <option value="{{$nok->id}}">{{$nok->last_name.' '.$nok->first_name.' '.$nok->middle_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Add Next of Kin</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('client.addons.dashboardfooter')
