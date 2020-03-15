@include('client.addons.dashboardheader')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Next of Kin</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{url('client/nextofkins/add')}}">
                            {{ csrf_field() }}
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') ?? '' }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') ?? '' }}.
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="hidden" name="membership_id" value="{{ session()->get('client_membership_id')  }}">
                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input class="form-control py-4" name="first_name" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input class="form-control py-4" name="last_name" id="inputLastName" type="text" placeholder="Enter last name" /></div>
                                </div>
                            </div>
                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Phone Number</label><input class="form-control py-4" id="inputPassword" type="text" name="phone_number" placeholder="Phone Number" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Alternate Phone Number</label><input class="form-control py-4" id="inputConfirmPassword" name="alternate_phone_number" type="text" placeholder="Alternate Phone Number" /></div>
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
