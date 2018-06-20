@extends('admin.layouts.master')
@section('title','Advertisement')
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-basic"><i class="icon-file-o"></i>
                        @if(isset($edit))
                        Edit Advertisement
                        @else
                         Add Advertisement
                        @endif
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
                        <form class="form form-horizontal" method="post" 
                             @if(isset($edit))
                              action="{{url('Admin/advertisement/update/'.$edit->id)}}"
                              @else
                              action="{{url('Admin/advertisement/add')}}"
                              @endif
                       enctype="multipart/form-data" >
                        {!! csrf_field() !!}
                        @if(isset($edit)) <input type="hidden" name="eximage" value="<?= $edit->add_image; ?>" /> @endif
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Advertisement Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="projectinput1" class="form-control" placeholder="Advertisement Title" name="add_title" @if(isset($edit)) value="<?= $edit->add_title; ?>" @endif>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Advertisement Photo</label>
                                    <div class="col-md-9">

                                        <input type="file" class="form-control" name="add_image" >
                                        <br>
                                        @if(isset($edit)) 
                                            <img width="30%" class="card-img-top img-fluid" src="{{ URL::asset('upload/adds/'.$edit->add_image) }}">
                                            
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">Advertisement Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="projectinput1" class="form-control" placeholder="Advertisement Link" name="add_link" @if(isset($edit)) value="<?= $edit->add_link; ?>" @endif>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Advertisement Position</h4>
                                    </div>
                                    <div class="card-body collapse in">
                                        <div class="card-block">
                                            <div class="row skin skin-square scrollbar">
                                                @if(isset($adds_position))
                                                    @foreach($adds_position as $ap)
                                                        <fieldset>
                                                            <input 
                                                            @if(isset($edit))
                                                                @if($edit->adds_position_id==$ap->id)
                                                                    checked="checked" 
                                                                @endif
                                                            @endif
                                                            type="radio" value="{{$ap->id}}" name="adds_position_id">
                                                            <label >{{$ap->name}}</label>
                                                        </fieldset>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput3">Active/Inactive</label>
                                    <div class="col-md-9">
                                        <input 
                                        @if(isset($edit))
                                                                @if($edit->isactive==1)
                                                                    checked="checked" 
                                                                @endif
                                                            @endif
                                        type="checkbox" name="isactive" class="switch" id="switch5" data-group-cls="btn-group-sm" />    
                                    </div>
                                </div>
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

    <!-- Both borders end-->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon-file-o"></i> Advertisement List</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adv. Title</th>
                                    <th>Adv. Photo</th>
                                    {{-- <th>Positions</th> --}}
                                    <th>Active/Inactive</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($adds))
                                @foreach($adds as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->add_title; ?></td>
                                    <td><img width="50%" class="card-img-top img-fluid" src="{{ URL::asset('upload/adds/'.$row->add_image) }}"></td>
                                    {{-- <td>{{$row->apname}}</td> --}}
                                    <td>
                                        <?php 
                                            if($row->isactive==1){
                                                echo '<span class="tag tag-default tag-success">Active</span>';
                                            }else{
                                                echo '<span class="tag tag-default tag-warning">Inactive</span>';
                                            } 
                                        ?> 
                                    </td>
                                    <td>
                                        <a href="{{url('Admin/advertisement/edit/'.$row->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        <a  href="{{url('Admin/advertisement/delete/'.$row->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Both borders end -->


</section>

@endsection
@section('css')
<!-- END VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">   


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/checkboxes-radios.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/switch.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-switch.min.css')}}">
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
    .lbl {
        line-height: 25px;
        min-height: 18px;
        min-width: 18px;
        font-weight: normal;
    }
    .scrollbar{
        max-height: 207px;
        min-height: 207px;
        display: block;
        overflow:hidden;
    }
    .scrollbar:hover {
        overflow-y: scroll;
    }
    /* Let's get this party started */
    .scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    /* Track */
    .scrollbar::-webkit-scrollbar-track {
        /*    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); */
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    /* Handle */
    .scrollbar::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #1d2b36; 
        /*    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); */
    }
    .scrollbar::-webkit-scrollbar-thumb:window-inactive {
        background: #1d2b36; 
    }
    .uploadimg img{
        max-width:220px;
        max-height: 115px;
    }
    .uploadimg input[type=file]{
        padding:10px;

    }
</style>




@endsection
@section('js')
<!-- END PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>    
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.min.js')}}" type="text/javascript"></script> 

<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script>

@endsection
