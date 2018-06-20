@extends('admin.layouts.master')
@section('title','New Reporter')
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
                        @if(isset($data))
                        <i class="icon-user-plus"></i> Edit Reporter
                        @else
                        <i class="icon-user-plus"></i> Add Reporter
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
                        
                        @if(isset($data))
                        
                        <form class="form" method="post" action="{{url('Admin/reporter-update/'.$data->id)}}">
                            <div class="form-body">
                                {!! csrf_field() !!}
                                <input type="hidden" name="" value="">
                                <div class="form-group">
                                    <label for="eventRegInput1">Reporter Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?= $data->name; ?>" class="form-control border-primary" placeholder="Reporter Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="eventRegInput2">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="placeTextarea" name="address" rows="3" placeholder="Address"><?= $data->address; ?></textarea>
                                </div>	
                                <div class="form-group">
                                    <label for="eventRegInput3">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" id="tel" class="form-control border-primary" placeholder="1-(555)-555-5555" name="phone" value="<?= $data->phone; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="eventRegInput3">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" id="eventRegInput4" class="form-control border-primary" placeholder="Email Address" name="email" value="<?= $data->email; ?>">
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="reset" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </form>
                        @else
                        <form class="form" method="post" action="{{url('Admin/reporter-add')}}">
                            <div class="form-body">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="eventRegInput1">Reporter Name <span class="text-danger">*</span></label>
                                    <input type="text" id="eventRegInput1" class="form-control border-primary" placeholder="Reporter Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="eventRegInput2">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="placeTextarea" name="address" rows="3" placeholder="Address"></textarea>
                                </div>	
                                <div class="form-group">
                                    <label for="eventRegInput3">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" id="tel" class="form-control border-primary" placeholder="1-(555)-555-5555" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="eventRegInput3">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" id="eventRegInput4" class="form-control border-primary" placeholder="Email Address" name="email">
                                </div>
                            </div>
                            <div class="form-actions center">
                                <button type="reset" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>
                        </form>
                        @endif
                        
                        
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
                    <h4 class="card-title"><i class="icon-users2"></i> Reporter List</h4>
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
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($rep))
                                @foreach($rep as $data)
                                <tr>
                                    <td><?= $data->id; ?></td>
                                    <td><?= $data->name; ?></td>
                                    <td><?= $data->address; ?></td>
                                    <td><?= $data->phone; ?></td>
                                    <td><?= $data->email; ?></td>
                                    <td>
                                        <a href="{{url('Admin/reporter/edit/'.$data->id)}}" title="Edit" class="btn btn-sm btn-outline-info"><i class="icon-pencil22"></i></a>
                                        <a  href="{{url('Admin/reporter/delete/'.$data->id)}}" title="Delete" class="btn btn-sm btn-outline-danger"><i class="icon-cross"></i></a>
                                        </div>
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
