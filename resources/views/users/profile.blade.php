@extends('layouts.app')
@section('title')
@section('content')
<div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
                        <div class="pd-20 bg-white border-radius-4 box-shadow">
                            <div class="profile-photo">

                                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                                <img src="images/photo2.jpg" alt="" class="avatar-photo">

                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pd-5">
                                                <div class="img-container" id="Photo_PreviewDiv">
                                                    <img id="image" src="images/photo2.jpg" alt="Picture">
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                            <div id="photo_container">      
                                            <a class="btn btn-outline-primary" id="photo_pickfiles" href="javascript:;"><i class="fa fa-cloud-upload "></i>Upload File</a>
                                            </div>

                                                <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center">{!! Auth::user()->name !!}</h5>
                            <p class="text-center text-muted">Lorem ipsum dolor sit amet</p>
                            <div class="profile-info">
                                <h5 class="mb-20 weight-500">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        {!! Auth::user()->email !!}
                                    </li>
                                    <li>
                                        <span>Phone Number:</span>
                                        619-229-0054
                                    </li>
                                    <li>
                                        <span>Country:</span>
                                        America
                                    </li>
                                    <li>
                                        <span>Address:</span>
                                        1807 Holden Street<br>
                                        San Diego, CA 92115
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-social">
                                <h5 class="mb-20 weight-500">Social Links</h5>
                                <ul class="clearfix">
                                    <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#db4437" data-colus"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-skills">
                                <h5 class="mb-20 weight-500">Key Skills</h5>
                                <h6 class="mb-5">HTML</h6>
                                <div class="progress mb-20" style="height: 6px;">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h6 class="mb-5">Css</h6>
                                <div class="progress mb-20" style="height: 6px;">
                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h6 class="mb-5">jQuery</h6>
                                <div class="progress mb-20" style="height: 6px;">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h6 class="mb-5">Bootstrap</h6>
                                <div class="progress mb-20" style="height: 6px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
                        <div class="bg-white border-radius-4 box-shadow height-100-p">
                            <div class="profile-tab height-100-p">
                                <div class="tab height-100-p">
                                    <ul class="nav nav-tabs customtab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Setting Tab start -->
                                        <div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
                                            <div class="profile-setting">
                                                {!! Former::framework('Nude') !!}
                                                {!! Former::open()->method('post')->action(route('update.profile')) !!}
                                                    <ul class="profile-edit-list row">
                                                        <li class="col-md-12">
                                                            <h4 class="text-blue mb-20">Edit Your Personal Setting</h4>
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                               {!! Former::text('name')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->name) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Middle Name</label>
                                                                {!! Former::text('middle_name')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->middle_name) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                              {!! Former::text('email')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->email) !!}
                                                            <div class="form-group">
                                                                <label>Date of birth</label>
                                                              {!! Former::text('dob')->class('form-control date-picker')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->dob : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Date of birth</label>
                                                              {!! Former::text('join_date')->class('form-control date-picker')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->join_date : '') !!}
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label>Gender</label>
                                                                <div class="d-flex">
                                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input" value="{!! $user->user_profile->gender == 'male' ? 'selected' : '' !!}">
                                                                    <label class="custom-control-label weigh for="customRadio4">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-5">
                                                                    <input type="radio" id="customRadio5" value="{!! $user->user_profile->gender == 'female' ? 'selected' : '' !!} name="gender"  class="custom-control-input">
                                                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                                                </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                {!! Former::text('country')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->country : '') !!} 
                                                            </div>
                                                            <div class="form-group">
                                                                <label>State</label>
                                                              {!! Former::text('state')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->state : '') !!}
                                                          </div>
                                                          <div class="form-group">
                                                                <label>City</label>
                                                              {!! Former::text('city')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->city : '') !!}
                                                          </div>
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                              {!! Former::text('zipcode')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->zipcode : '') !!}
                                                          </div>
                                                           <div class="form-group">
                                                                <label>Hobby</label>
                                                              {!! Former::textarea('hobby')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->hobby : '') !!}
                                                          </div>
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                              {!! Former::text('phone')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->phone : '') !!}
                                                          </div>
                                                          <div class="form-group">
                                                                <label>Mobile Number</label>
                                                              {!! Former::text('mobile')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->mobile : '') !!}
                                                          </div>
                                                          </div>
                                                            <div class="form-group">
                                                                <label>Pan Number</label>
                                                              {!! Former::text('pan_number')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->pan_number : '') !!}
                                                          </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                 {!! Former::textarea('address_1')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->address_1 : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Managment Level</label>
                                                                 {!! Former::text('management_level')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->management_level : '') !!}
                                                            </div>
                                                             <div class="form-group">
                                                                <label>Parmanent Address</label>
                                                                 {!! Former::textarea('address_2')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->address_2 : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Facebook URL:</label>
                                                              {!! Former::text('facebook')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->facebook : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Twitter URL:</label>
                                                              {!! Former::text('twitter')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->twitter : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Linkedin URL:</label>
                                                              {!! Former::text('linkedin')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->linkedin : '') !!}
                                                            </div>
                                                            <div class="form-group">label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->website : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Google-plus URL:</label>
                                                  ->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->google : '') !!}
                                                            </div>
                                                            <div class="form-group">
                                                                <label> URL:</label>
                                                              {!! Former::text('skype')->class('form-control')->label(false)->placeholder('Enter Your Name')->value($user->user_profile ? $user->user_profile->skype : '') !!}
                                                            </div>
                                                            {!! Former::submit('Save') !!}
               
                                                        </li>
                                                    </ul>
                                               {!! Former::close() !!}
                                            </div>
                                        </div>
                                        <!-- Setting Tab End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection