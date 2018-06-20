@extends('admin.layouts.master')
@section('title','Edit User')
@include('admin.include.msg')
@section('content')
<section class="col-md-7 offset-md-2 col-xs-8 offset-xs-2  box-shadow-2 p-0">
    <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
        <div class="card-header no-border pb-0">
            <div class="card-title text-xs-center">
                <img src="{{asset('img/logo.png')}}" alt="logo">
            </div>
            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Edit User</span></h6>
        </div>
        <div class="card-body collapse in">
            <div class="card-block">

                <form class="form-horizontal" method="post" action="{{ url('Admin/user/update') }}">
                     {!! csrf_field() !!}
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="name" id="display_name" class="form-control input-lg" placeholder="Full Name" tabindex="3"  required data-validation-required-message= "Please enter display name." value="{{ Auth::user()->fname }} ">
                        <div class="form-control-position">
                            <i class="icon-head"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="name" id="display_name" class="form-control input-lg" placeholder="Full Name" tabindex="3"  required data-validation-required-message= "Please enter display name." value="{{ Auth::user()->lname }} ">
                        <div class="form-control-position">
                            <i class="icon-head"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                    </fieldset>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required data-validation-required-message= "Please enter email address." value="{{ Auth::user()->email }}">
                        <div class="form-control-position">
                            <i class="icon-mail6"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                    </fieldset>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
                                <div class="form-control-position">
                                    <i class="icon-key3"></i>
                                </div>
                                <div class="help-block font-small-3"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" data-validation-matches-match="password" data-validation-matches-message="Password & Confirm Password must be the same.">
                                <div class="form-control-position">
                                    <i class="icon-key3"></i>
                                </div>
                                <div class="help-block font-small-3"></div>
                            </fieldset>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="offset-md-3 col-md-6">
                            <button type="submit" class="btn btn-danger btn-lg btn-block"><i class="icon-unlock2"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">   
<style type="text/css">
    div.dataTables_length{
        padding-left: 10px;
        padding-top: 15px;
    }

    .dataTables_length>label{
        margin-bottom: 0px !important;
        display:block !important;
    }

    div.dataTables_filter
    {
        padding-right: 10px;
    }

    div.dataTables_info{
        padding-left: 10px;
    }

    div.dataTables_paginate{
        padding-right: 10px;
        padding-top: 5px;
    }


</style>
<link rel="stylesheet" type="text/css" href="{{asset('app-assets//vendors/css/forms/selects/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/summernote.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/codemirror.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/theme/monokai.css')}}">

@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</script><script src="{{asset('app-assets//vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets//js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/editors/codemirror/lib/codemirror.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/codemirror/mode/xml/xml.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/summernote/summernote.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/js/scripts/editors/editor-summernote.min.js')}}" type="text/javascript"></script>    

<script type="text/javascript">
    $(document).ready(function(){
        $('.summernote').summernote({
            height: 450, //set editable area's height
            placeholder: 'About Us  Details',
            codemirror: {// codemirror options
                theme: 'flatly'
            },
        });
    });

</script>
@endsection
