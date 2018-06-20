@extends('admin.layouts.master')
@section('title','Breaking News')
@section('breadcrumb')
@include('admin.include.breadcrumb')
@endsection
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">
                        <i class="icon-file-o"></i> Set Breaking News
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
                        <form class="form"
                              method="post" 
                              @if(isset($edit))
                              action="{{url('Admin/breakingnews/update/')}}"
                              @else
                              action="{{url('Admin/breakingnews/add')}}"
                              @endif
                              enctype="multipart/form-data" 
                              >
                              {!! csrf_field() !!}
                              <div class="form-body">                                
                                <div class="form-group">
                                    <label class="col-md-3" for="eventRegInput1">Select Article For Breaking News </label>                                   
                                    <div class="col-md-9">
                                        <select name="com_news_id" class="select2 form-control">

                                            <option selected>Select Article For Breaking News</option>
                                            @if(isset($com_news))
                                            @foreach($com_news as $news)
                                            <option value="{{ $news->id }}">{{ $news->heading }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-3 label-control" for="projectinput3">Active / Inactive</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" name="status" class="switch" id="switch5" data-group-cls="btn-group-md" />    
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
                    <h4 class="card-title"><i class="icon-file-o"></i> Breaking News List</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <di                            v class="heading-elements">
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
                                <th  style="width: 50px;">ID</th>
                                <th>News Headline</th>
                                <th style="width: 100px;">Active / Inactive</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data))
                            @foreach($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->heading}}</td>
                                <td>
                                    <?php
                                    if ($row->status == 'on') {
                                        echo '<span class="tag tag-default tag-success">Active</span>';
                                    } else {
                                        echo '<span class="tag tag-default tag-warning">Inactive</span>';
                                    }
                                    ?> 
                                </td>
                                <td>
                                    <a  href="{{url('Admin/breakingnews/delete/'.$row->id)}}" class="btn btn-danger" data-repeater-delete=""> <i class="icon-cross2"></i> Delete</a>
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

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/switch.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-switch.min.css')}}">
@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</script><script src="{{asset('app-assets//vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets//js/scripts/forms/select/form-select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script>
@endsection
