@extends('admin.layouts.master')
@section('title','Edit User')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">
                        <i class="icon-file-o"></i> Edit User
                    </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form-horizontal" method="post" action="{{ url('Admin/user/update') }}">
                     {!! csrf_field() !!}
                            <div class="form-group col-md-6 mb-2">
                                <input type="text" class="form-control" value=" {{ Auth::user()->fname }}" placeholder="First Name" name="fname">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <input type="text" class="form-control" value=" {{ Auth::user()->lname }}" placeholder="Last Name" name="lname">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <input type="text" class="form-control" value=" {{ Auth::user()->email }}" placeholder="E-mail" name="email">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <input type="text" class="form-control" value=" {{ Auth::user()->phone }}" placeholder="Phone" name="phone">
                            </div>

                            <div class="form-group col-md-6 mb-2">
                                <select name="gender" class="form-control">
                                    <option value="none" selected="" disabled="">Select Gender</option>
                                    @if(  Auth::user()->gender =='Male')
                                    <option selected="" value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    @else
                                    <option selected value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <div class="input-group">
                                    <input type='text' name="dob" value=" {{ Auth::user()->dob }}" class="form-control pickadate-dropdown" placeholder="Date of Birth"/>
                                    <span class="input-group-addon">
                                        <span class="icon-calendar5"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 mb-2">
                                <textarea rows="5" class="form-control" name="address" placeholder="Address"> {{ Auth::user()->address }}</textarea>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <div class="form-actions center">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<!-- END VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/pickers/daterange/daterange.min.css')}}">

@endsection


@section('js')
<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.39b.delay')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/pickers/dateTime/picker-date-time.min.js')}}" type="text/javascript"></script>
@endsection
