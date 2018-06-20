@extends('admin.layouts.master')
@section('title','News Article')
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
                    <h4 class="card-title" id="horz-layout-basic">
                        @if(isset($edit))
                        Edit Compose a News Article
                        @else
                        Add Compose a News Article
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
                        <form class="form form-horizontal"  method="post" 
                              @if(isset($edit))
                              action="{{url('Admin/news_article/update/'.$edit->id)}}"
                              @else
                              action="{{url('Admin/news_article/add')}}"
                              @endif
                              enctype="multipart/form-data" 
                              >
                              {!! csrf_field() !!}
                              @if(isset($edit)) <input type="hidden" name="eximage" value="<?= $edit->thumbnail; ?>" /> @endif
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput1">News Headline</label>
                                    <div class="col-md-9">
                                        <input type="text" id="projectinput1" class="form-control" placeholder="News Headline" name="heading"
                                               @if(isset($edit))
                                               value="<?= $edit->heading ?>"
                                               @endif
                                               >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput2">News Reporter</label>
                                    <div class="col-md-4">
                                        <select id="projectinput6" name="rid" class="form-control">
                                            <option value="none" selected="" disabled="">Select Reporter Name</option>
                                            @if(isset($rep))
                                            @foreach($rep as $re)
                                            <option 
                                                @if(isset($edit)) 
                                                @if($edit->rid==$re->id) 
                                                selected="selected"
                                                @endif 
                                                @endif
                                                value="<?= $re->id; ?>"><?= $re->name; ?></option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput3">Spotlight News</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" class="switch" id="switch5" name="spid" data-group-cls="btn-group-sm" 
                                               @if(isset($edit))
                                               @if($edit->spid=='on')
                                               checked="checked" 
                                               @endif
                                               @endif
                                               />    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput3">Country News</label>
                                    <div class="col-md-9">
                                        <input type="checkbox" 
                                        @if(isset($edit))
                                            @if(!empty($edit->divid))
                                                checked="checked" 
                                            @endif
                                        @endif
                                        class="switch checkcountry" id="switch5" data-group-cls="btn-group-sm" />    
                                    </div>
                                </div>
                                <div id="checkbox" 
                                @if(isset($edit))
                                    @if(empty($edit->divid))
                                        style="display: none"
                                    @endif
                                @else
                                    style="display: none"
                                @endif
                                >
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput4">Division News</label>
                                        <div class="col-md-4">
                                            <select id="div" name="divid"  class="form-control">
                                                <option value="none" selected="" disabled="">Select Division Name</option>
                                                @if(isset($div))
                                                @foreach($div as $divis)
                                                <option 
                                                    @if(isset($edit))
                                                    @if($edit->divid==$divis->id)
                                                    selected="selected" 
                                                    @endif
                                                    @endif
                                                    value="<?= $divis->id; ?>"><?= $divis->name; ?></option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput4">District News</label>
                                        <div class="col-md-4">
                                            <select id="dist" name="disid" class="form-control">
                                                <option value="none" selected="" disabled="">Select District Name</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput9">Compose News</label>
                                    <div class="col-md-9">
                                        <textarea rows="5" class="summernote" name="content" placeholder="Compose News">
                                            @if(isset($edit))
                                                {{$edit->content}}
                                            @endif
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Top Gallery</h4>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <div class="row skin skin-square scrollbar">
                                                        @if(isset($top_gallery_positions))
                                                            @foreach($top_gallery_positions as $tgp)
                                                            <fieldset>
                                                                <input type="radio" 
                                                                       @if(isset($edit)) 
                                                                            @if($tgp->chk_status>0) 
                                                                                checked="checked"
                                                                            @endif 
                                                                       @endif
                                                                       value="{{$tgp->id}}" name="top_gallery_pos_id">
                                                                       <label >{{$tgp->name}}</label>
                                                            </fieldset>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Select Related News</h4>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block pb-0">
                                                    <fieldset class="form-group position-relative mb-0">
                                                        <input type="text" class="form-control form-control-md input-md live-search-box" id="iconLeft" placeholder="Search Related News">
                                                        <div class="form-control-position">
                                                            <i class="icon-search font-medium-4"></i>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="card-block">
                                                    <div class="row skin skin-square scrollbar">
                                                        @if(isset($relns))
                                                        @foreach($relns as $re)
                                                        <fieldset>
                                                            <ul class="live-search-list" style="list-style: none;">
                                                                <li style="padding: 0; margin: 0; margin-left: -25px;">
                                                                    <label>
                                                                        <input 
                                                                       @if(isset($edit))
                                                                            @if($re->relatednews>0)
                                                                            checked="checked" 
                                                                            @endif
                                                                        @endif
                                                                            type="checkbox" value="{{$re->id}}" name="rel_news_id[]"  >
                                                                            {{$re->heading}}
                                                                    </label>
                                                                </li>
                                                            </ul>
                                                        </fieldset>
                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Top Six News</h4>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <div class="row skin skin-square scrollbar">
                                                        @if(isset($top_news_positions))
                                                        @foreach($top_news_positions as $tnp)
                                                        <fieldset>
                                                            <input
                                                               @if(isset($edit)) 
                                                                            @if($tnp->chk_news_status>0) 
                                                                                checked="checked"
                                                                            @endif 
                                                                       @endif
                                                                type="radio" value="{{$tnp->id}}" name="top_news_pos_id">
                                                                <label >{{$tnp->name}}</label>
                                                        </fieldset>
                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">News Section</h4>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <div class="row skin skin-square scrollbar" id="seccat">
                                                        @if(isset($cat))
                                                        @foreach($cat as $row)
                                                        <fieldset>
                                                            <label >
                                                                <input type="radio" 
                                                                       @if(isset($edit)) 
                                                                       @if($edit->cid==$row->id) 
                                                                       checked="checked"
                                                                       @endif 
                                                                       @endif  
                                                                       value="{{$row->id}}" class="cid" name="cid"  >
                                                                       {{$row->name}}
                                                            </label>
                                                        </fieldset>
                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">News Sub-Section</h4>
                                            </div>
                                            <div class="card-body collapse in">
                                                <div class="card-block">
                                                    <div class="row skin skin-square scrollbar" id="showSubSection">
                                                        <span id="loadingSubcat"></span>
                                                        @if(isset($subcat))
                                                        @foreach($subcat as $sc)
                                                        <fieldset class="scid" id="scid_{{$sc->id}}" data-id="{{$sc->cid}}">
                                                            <label >
                                                                <input 
                                                                    @if(isset($edit))
                                                                        @if($edit->scid==$sc->id)
                                                                            checked="checked"
                                                                        @endif
                                                                    @endif
                                                                    type="radio" value="{{$sc->id}}" name="scid"  >
                                                                    {{$sc->name}}
                                                            </label>
                                                        </fieldset>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">News Thumbnail</h4>
                                            </div>
                                            <div class="card-block uploadimg">
                                                @if(isset($edit)) <input type="hidden" name="eximage" value="<?= $edit->thumbnail; ?>" /> @endif
                                                <input type='file' name="thumbnail" onchange="readURL(this);" />
                                                <img id="thumb" 
                                                     @if(isset($edit))
                                                     src="{{ URL::asset('upload/news/'.$edit->thumbnail) }}"
                                                     @endif
                                                     src="http://placehold.it/115" alt="your image" />
                                                 
                                                
                                                 
                                            </div>
                                        </div>
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
</section>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/summernote.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/codemirror.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/theme/monokai.css')}}">
<!-- END VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">   

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/switch.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-switch.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/checkboxes-radios.min.css')}}">

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
    .uploadimg{ height: 248px; }
    .uploadimg img{
        /*max-width:220px;*/
        max-height: 160px;
    }
    .uploadimg input[type=file]{
        padding:5px;

    }
</style>




@endsection
@section('js')

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/editors/codemirror/lib/codemirror.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/codemirror/mode/xml/xml.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/editors/summernote/summernote.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/forms/switch.min.js')}}" type="text/javascript"></script>


<script src="{{asset('app-assets/js/scripts/editors/editor-summernote.min.js')}}" type="text/javascript"></script>    
<script src="{{asset('app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>    
<script src="{{asset('app-assets/js/scripts/forms/checkbox-radio.min.js')}}" type="text/javascript"></script> 

<script>
//subcategory    
function showSubCategory(cid)
{
    $(".scid").hide();
    var i = 0;
    
    $("#loadingSubcat").html("<code>Loading Please wait...</code>");
    $("#loadingSubcat").show();
    $.each($(".scid"), function (index, fidset) {
        console.log(fidset);
        if ($(fidset).attr('data-id') == cid)
        {
            $("#loadingSubcat").hide();
            $(fidset).show();
            i += (1 - 0);
        }
    });

    if (i < 1)
    {
        $("#loadingSubcat").html("<code>No Subsection Found</code>");
    }

}

$(document).ready(function () {
    //subcategory
    $(".scid").hide();
    $('label').click(function () {
        var secCat = $(this).parent().parent('div').attr('id');
        //console.log(secCat);
        if (secCat == 'seccat')
        {
            var checkString = $(this).children('div:eq(0)').attr('class');
            var booleanBox = checkString.includes("iradio_square-red");
            if (booleanBox)
            {
                cid = $(this).children('div:eq(0)').children('input[name=cid]').val();
                showSubCategory(cid);
            }
        }

    });
    
    <?php
    if(isset($edit)):
        if(!empty($edit->cid)):
            ?>
            showSubCategory({{$edit->cid}});
            <?php
        endif;
    endif;
    ?>

    $('.iCheck-helper').click(function () {
        var secCat = $(this).parent().parent().parent().parent('div').attr('id');
        //console.log(secCat);    
        if (secCat == 'seccat')
        {
            var checkString = $(this).parent('div').attr('class');
            var booleanBox = checkString.includes("iradio_square-red");
            if (booleanBox)
            {
                cid = $(this).parent('div').children('input[name=cid]').val();
                showSubCategory(cid);
            }
        }
    });



    //country
    $('.checkcountry').change(function () {
        if (this.checked)
            $('#checkbox').fadeIn('slow');
        else
            $('#checkbox').fadeOut('slow');

    });
    //editor
    $('.summernote').summernote({
        height: 250, //set editable area's height
        placeholder: 'Compose News Article',
        codemirror: {// codemirror options
            theme: 'flatly'
        },

    });
//search
    $('.live-search-list li').each(function () {
        $(this).attr('data-search-term', $(this).text().toLowerCase());
    });

    $('.live-search-box').on('keyup', function () {

        var searchTerm = $(this).val().toLowerCase();

        $('.live-search-list li').each(function () {

            if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                $(this).show();
            } else {
                $(this).hide();
            }

        });

    });
});
//ajax load image 
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#thumb')
                    .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

@if(isset($edit))
    @if(!empty($edit->divid))
        var loadingscid = '<option value="0">Loading Please Wait...</option>';
        $("#dist").html(loadingscid);
        $.post("{{url('Admin/ajax/districtData')}}", {'div':'{{$edit->divid}}', '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
            //console.log(cdata);
            var loadingscid = '<option value="0">Please Select District</option>';
            $.each(divdata, function (index, val) {
                //console.log(val);
                var selText='';
                if(val.id=={{$edit->disid}})
                {
                    selText='selected="selected"';
                }
                loadingscid += '<option '+selText+' value="' + val.id + '">' + val.name + '</option>';
            });
            var getlength = divdata.length;
            if (getlength == 0)
            {
                var loadingscid = '<option value="0">Please Select Another Division</option>';
                $("#dist").html(loadingscid);
            } else
            {
                $("#dist").html(loadingscid);
            }
        });
    @endif
@endif

// ajax load District
$("#div").click(function () {

    var div = $(this).val();
    if (div == null || div == 0)
    {
        var loadingscid = '<option value="0">Please Select Division</option>';
        $("#dist").html(loadingscid);
    } else
    {
        var loadingscid = '<option value="0">Loading Please Wait...</option>';
        $("#dist").html(loadingscid);
        $.post("{{url('Admin/ajax/districtData')}}", {'div': div, '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
            //console.log(cdata);
            var loadingscid = '<option value="0">Please Select District</option>';
            $.each(divdata, function (index, val) {
                //console.log(val);
                loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
            });
            var getlength = divdata.length;
            //console.log(getlength);
            if (getlength == 0)
            {
                var loadingscid = '<option value="0">Please Select Another Division</option>';
                $("#dist").html(loadingscid);
            } else
            {
                $("#dist").html(loadingscid);
            }
        });
    }
});


</script>

@endsection
