@extends('computer.master')
@section('title', trans("translate.mon_trong_ngay"))
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans("translate.mon_trong_ngay") }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">  
                        <div class="panel-body">
                        @if(session('thongbao'))
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> {{ session('thongbao') }}
                            </div>
                        @endif
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-special">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Tên</th>
                                        <th>Hình ảnh</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $arr_list_special = array();
                                        foreach ($list_special as $item) {
                                            $arr_list_special[] = $item["idproduct"];
                                        } 
                                    ?>
                                    @foreach($all_product as $item)
                                    <?php
                                        $check = in_array($item->idproduct, $arr_list_special); 
                                    ?>
                                    <tr class="odd gradeX">
                                        <td>{{ $item->id }}</td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/product/'.$item->image) }}" style="width: 55px"> 
                                        </td>
                                        <td>{{ $item->namelang($item->idproduct)['name'] }}</td>
                                        <td>
                                            @if($check == 1)
                                                <i class="dt_change_in_menu btn btn-info" in_menu="1" product_id="{{ $item->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"> {{ trans("translate.in_menu") }}</i>
                                            @else
                                                <i class="dt_change_in_menu btn btn-danger" in_menu="0" product_id="{{ $item->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"> {{ trans("translate.add_in_menu") }}</i>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- model --> 


@endsection()
@section('script')
<script type="text/javascript">

$(document).ready(function() {
    $('#dataTables-special').DataTable({
        "responsive": true,
        "pageLength": 1000
    });



    $(".dt_change_in_menu").click(function(e){
      e.preventDefault()

      btn = $(this)
      btn.attr('disabled','disabled')
      btn.html("Loading...")

      base_url      = $(this).attr('base_url')
      token         = $(this).attr('token')
      product_id    = $(this).attr('product_id') 
      in_menu       = $(this).attr('in_menu') 

      txt_in = "{{ trans('translate.in_menu') }}"
      txt_add = "{{ trans('translate.add_in_menu') }}"

      $.ajax({
          url: base_url+'/admin/specialgroup/list/edit',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "product_id":product_id, 
              "in_menu":in_menu},
          success:function(data){ 
            btn.removeAttr("disabled")

            if(data == 1){
                if(in_menu == 0){
                    btn.removeClass("btn-danger").addClass("btn-info").attr("in_menu","1").html(txt_in);
                }else{
                    btn.removeClass("btn-info").addClass("btn-danger").attr("in_menu","0").html(txt_add);
                }
            }

          }
      }) 
    })


})

</script>
@endsection()