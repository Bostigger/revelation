@include('client.addons.dashboardheader')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{url('client/nextofkins/add')}}">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Bank Name</label><input class="form-control py-4" name="first_name" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Bank Branch</label><input class="form-control py-4" name="last_name" id="inputLastName" type="text" placeholder="Enter last name" /></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Name on Account</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Account Number</label><input class="form-control py-4" id="inputPassword" type="text" name="phone_number" placeholder="Phone Number" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputConfirmPassword">Select Next of Kin</label>
                                        <select class="form-control py-4" id="inputConfirmPassword" name="next_of_kin_id" type="text">
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
