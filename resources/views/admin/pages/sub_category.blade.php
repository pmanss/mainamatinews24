@extends('admin.layouts.master')
@section('title','Sub Category')
@section('breadcrumb')
@include('admin.include.breadcrumb')
@endsection
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">


    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-card-center">

                        @if(isset($edit))
                        <i class="icon-user-plus"></i> Edit SubCategory
                        @else
                        <i class="icon-user-plus"></i> Add SubCategory
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
                        <form class="form" method="post" 
                              @if(isset($edit))
                              action="{{url('/Admin/sub_category/update/'.$edit->id)}}"
                              @else
                              action="{{url('/Admin/sub_category-add/')}}"
                              @endif
                              ">
                              {!! csrf_field() !!}
                              <div class="form-body">
                                <div class="form-group">
                                    <label for="eventRegInput1">Name <span class="text-danger">*</span></label>
                                    <input type="text" id="eventRegInput1" class="form-control border-primary" placeholder="Customer Name" name="name" 
                                           @if(isset($edit))
                                           value="{{$edit->name}}" 
                                           @endif
                                           >
                                </div>
                            </div>
                            <div class="form-body">                                
                                <div class="form-group">
                                    <label for="eventRegInput1">Category Name <span class="text-danger">*</span></label>                                   
                                    <select class="form-control" name="cid">
                                        <option selected="selected" disabled="">Select Category Name</option>
                                        @if(!empty($cat))
                                        @foreach($cat as $row)
                                        <option 
                                            @if(isset($edit)) 
                                                @if($edit->cid==$row->id) 
                                                selected="selected"
                                                @endif 
                                            @endif
                                            value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                        @endforeach
                                        @endif
                                    </select>                                           
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
                    <h4 class="card-title"><i class="icon-file-o"></i> Sub Category List</h4>
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
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($subcat))
                                @foreach($subcat as $row)
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->cname; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td>
                                        <a href="{{url('Admin/sub_category/edit/'.$row->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        {{-- <a  href="{{url('Admin/sub_category/delete/'.$row->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a> --}}

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

@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@endsection
