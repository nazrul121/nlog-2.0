<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div> <h5 class="text-center pt-3 pb-2">Basic information</h5><hr> </div>
                        <div class="card-body pt-3">
                            <div class="theme-form">
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Client Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="full name" value="{{old('name')??$client->name}}">
                                    <small class="form-text text-danger">{{ $errors->first('name')}}</small>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Company Name</label>
                                    <input type="text" class="form-control" name="company" placeholder="company" value="{{old('company')??$client->company}}">
                                    <small class="form-text text-danger">{{ $errors->first('company')}}</small>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Phone / Mobile No.</label>
                                    <input type="text" class="form-control" name="phone" placeholder="phone" value="{{old('phone')??$client->phone}}">
                                    <small class="form-text text-danger">{{ $errors->first('phone')}}</small>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')??$client->email}}">
                                    <small class="form-text text-danger">{{ $errors->first('email')}}</small>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Office Address</label>
                                    <textarea rows="3" class="form-control" name="address" placeholder="address">{{old('address')??$client->address}}</textarea>
                                    <small class="form-text text-danger">{{ $errors->first('address')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div> <h5 class="text-center pt-3 pb-2">Logo & photo</h5><hr>  </div>
                        <div class="card-body pt-3"> 
                            
                            <div class="form-group">
                                <label class="col-form-label pt-0">Client Photo - [optional]-[size should be: <code>320x290</code>px]</label>
                                <input type="file" class="dropify" data-height="160" name="photo" 
                                @if($client->photo) data-default-file="/{{$client->photo}}" @endif>
                                <small class="form-text text-danger">{{ $errors->first('photo')}}</small>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label pt-0">Company Logo - [optional]-[size should be: <code>190x95</code>px]</label>
                                <input type="file" class="dropify" data-height="160" name="logo" 
                                @if($client->logo) data-default-file="/{{$client->logo}}" @endif>
                                <small class="form-text text-danger">{{ $errors->first('logo')}}</small>
                            </div>
                        
                            <div class="col text-right">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <label class="col-form-label pt-0">Visibility</label> &nbsp; &nbsp; 
                                    <div class="radio radio-primary">
                                        <input type="radio" name="status" id="status1" value="1" required="" @if($client->status=='1') checked @endif>
                                        <label for="status1" class="mb-0">Active</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="status" id="status2" value="0" required="" @if($client->status=='0') checked @endif>
                                        <label for="status2" class="mb-0">Inactive</label>
                                    </div>
                                </div>
                                <small class="form-text text-danger">{{$errors->first('status')}}</small>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>