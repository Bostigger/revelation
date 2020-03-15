@include('client.addons.dashboardheader')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Profile Setup</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{url('client/nextofkins/add')}}">
                            {{ csrf_field() }}
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') ?? '' }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($error->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="hidden" name="membership_id" value="{{ session()->get('client_membership_id')  }}">
                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input class="form-control py-3" name="first_name" id="inputFirstName" type="text" placeholder="Enter first name" value="{{ $client->first_name??null }}"/></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input class="form-control py-3" name="last_name" id="inputLastName" type="text" placeholder="Enter last name" value="{{ $client->last_name??null }}"/></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Other Name(s)</label><input class="form-control py-3" name="last_name" id="inputLastName" type="text" placeholder="Enter last name" value="{{ $client->middle_name??null }}"/></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputOtherName">Date Of Birth</label><input class="form-control py-3" name="last_name" id="inputOtherName" type="date" placeholder="Select Date Of Birth" value="{{ $client->dob??null }}"/></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-3" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputPhone">Phone Number</label><input class="form-control py-3" id="inputPhone" type="text" name="phone_number" placeholder="Phone Number" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPhone">Alternate Phone Number</label><input class="form-control py-3" id="inputConfirmPhone" name="alternate_phone_number" type="text" placeholder="Alternate Phone Number" /></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputMaritalStatus">Marital Status</label>
                                        <select class="form-control" id="inputMaritalStatus" type="text" name="marital_status">
                                            <option value="SINGLE">Single</option>
                                            <option value="MARRIED">Married</option>
                                            <option value="DIVORCED">Divorced</option>
                                            <option value="WIDOWED">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputOccupation">Occupation</label><input class="form-control py-3" id="inputOccupation" name="occupation" type="text" placeholder="Enter occupation" /></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputResidentialAddress">Residential Address</label>
                                <textarea class="form-control py-3" id="inputResidentialAddress" name="residetial_address" type="email" aria-describedby="emailHelp" placeholder="Enter Residential address"></textarea>
                            </div>

                            <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Update Info</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('client.addons.dashboardfooter')
