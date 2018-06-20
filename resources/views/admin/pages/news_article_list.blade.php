@extends('admin.layouts.master')
@section('title','News Article')
@section('breadcrumb')
@include('admin.include.breadcrumb')
@endsection
@include('admin.include.msg')
@section('content')
<section id="file-exporaat">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- Both borders end-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="icon-file-o"></i> News Article List</h4>
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
                                <table class="table table-striped table-bordered zero-configuration table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="width: 250px !important;">Name</th>
                                            <th>Reporter Name</th>
                                            <th>Page Name</th>
                                            <th>Sub Page Name</th>
                                            <th>Date</th>
                                            <th style="width: 100px !important;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($com_news))
                                        @foreach($com_news as $data)
                                        <tr>
                                            <td><?= $data->id; ?></td>
                                            <td><?= $data->heading; ?></td>
                                            <td><?= $data->rname; ?></td>
                                            <td><?= $data->cname; ?></td>
                                            <td><?= $data->sname; ?></td>
                                            <td><?= $data->created_at; ?></td>
                                            <td>
                                                <a href="{{url('Admin/news/article/list/edit/'.$data->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                                <a  href="{{url('Admin/news/article/list/delete/'.$data->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>

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
        </div>
        <!--/.col (left) -->
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
    div.dataTable tr th{width:500px !important;}
</style>

@endsection
@section('js')
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@endsection
