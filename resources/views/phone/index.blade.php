@extends('phone.master')
@section('title','workflow management - customer')
@section('content')
<div id="page-wrapper">
	<div class="row nn-content-phone">
        <div class="col-lg-12">
            <div class="page-header"><h2>Danh sách công việc</h2>
            <select id="nn-select-wp" class="form-group nn-float-right">
                <option value="1"> Công việc mới</option>
                <option value="2"> Công việc đang làm</option>
                <option value="3"> Công việc hoàn thành</option>
                <option value="4"> Công việc trễ</option>
                <option value="5" selected> Tất cả công việc</option>                
            </select>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-xs-12">
        	@for($a=0;$a<=20;$a++)
            
        	<div data-toggle="modal" data-target=".nn-view-work-phone"  class="col-lg-4 col-md-6 nn-info-work-phone nn-stt-wp-{{ $m = rand(1,4) }}">
        		<div class="col-xs-2 nn-stt-{{ $m }}">
        			
        		</div>
        		<div class="col-xs-10">
	    			<p><b>Cài đặt phần mềm - Đi dây mạng</b><br>
	    			<i class="fa fa-phone"> 
                            Điện thoại: <abbr title="Phone">0123.456.789</i><br>
	    			<i class="fa fa-map-marker"> Địa chỉ: 16 nguyễn hành </i>
	    			<p class="nn-float-right nn-time-wp"><i class="fa fa-clock-o"></i> Time: 08:00 Am</p>
        		</div>      		
        	</div>

        	@endfor	
        </div>
    </div>

</div>
@endsection