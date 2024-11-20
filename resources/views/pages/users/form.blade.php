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
                                    <label class="col-form-label pt-0">User Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="full name" value="{{old('name')??$user->name}}">
                                    <small class="form-text text-danger">{{ $errors->first('name')}}</small>
                                </div>
                                <div class="col mt-3 mb-3">                                
                                    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                        <label class="col-form-label pt-0">Gender</label> &nbsp; &nbsp; 
                                        <div class="radio radio-primary">
                                            <input type="radio" name="sex" id="sex1" value="male" required="" @if($user->sex=='male') checked @endif>
                                            <label for="sex1" class="mb-0">Male</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input type="radio" name="sex" id="sex2" value="female" required="" @if($user->sex=='female') checked @endif>
                                            <label for="sex2" class="mb-0">Female</label>
                                        </div>
                                        <div class="radio radio-primary">
                                            <input type="radio" name="sex" id="sex3" value="other" required="" @if($user->sex=='other') checked @endif>
                                            <label for="sex3" class="mb-0">Other</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-danger">{{$errors->first('sex')}}</small>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-form-label pt-0">Mobile No.</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="mobile" value="{{old('mobile')??$user->mobile}}">
                                    <small class="form-text text-danger">{{ $errors->first('mobile')}}</small>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Present Address</label>
                                    <textarea rows="6" class="form-control" name="address" placeholder="address">{{old('address')??$user->address}}</textarea>
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
                        <div> <h5 class="text-center pt-3 pb-2">Login details & photo</h5><hr>  </div>
                        <div class="card-body pt-3"> 
                            
                            <div class="form-group">
                                <label class="col-form-label pt-0">Photo - [optional]-[size should be: <code>320x290</code>px]</label>
                                <input type="file" class="dropify" name="photo" 
                                @if($user->photo) data-default-file="/{{$user->photo}}" @endif>
                                <small class="form-text text-danger">{{ $errors->first('photo')}}</small>
                            </div>

                           <div class="form-group">
                                <label class="col-form-label pt-0">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')??$user->email}}">
                                <small class="form-text text-danger">{{ $errors->first('email')}}</small>
                            </div>

                             <div class="form-group">
                                <label class="col-form-label pt-0">Password</label>
                                <input type="text" class="form-control" name="password" value="123" value="{{old('password')}}">
                                <small class="form-text text-danger">{{ $errors->first('password')}}</small>
                            </div>

                            <div class="col text-right">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                    <label class="col-form-label pt-0">Visibility</label> &nbsp; &nbsp; 
                                    <div class="radio radio-primary">
                                        <input type="radio" name="status" id="status1" value="1" required="" @if($user->status=='1') checked @endif>
                                        <label for="status1" class="mb-0">Active</label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input type="radio" name="status" id="status2" value="0" required="" @if($user->status=='0') checked @endif>
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