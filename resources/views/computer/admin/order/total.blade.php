@extends('computer.master')
@section('title','Sản phẩm')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.Dashboard')}}</h1>
        <!-- /.col-lg-12 -->
    	</div>
    </div>
	<div class="row">
	    <div class="col-lg-12">
	        <h3 style="color:#B34436 ">{{ trans('translate.Orderoverview') }}</h3>
	    </div>
	    <div class="row col-xs-12">    
	        <div class="progress">
	          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{ $new }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $new }}%">
	            {{ trans('translate.Neworder')}}
	          </div>
	        </div>
	        <div class="progress">
	          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $hand }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $hand }}%">
	            {{ trans('translate.Ordersprocessing')}}
	          </div>
	        </div>
	        <div class="progress">
	          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $success }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $success }}%">
	            {{ trans('translate.Ordersuccess')}}
	          </div>
	        </div>
	        <div class="progress">
	          <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="{{ $del }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $del }}%">
	            {{ trans('translate.Ordercancel')}}
	          </div>
	        </div> 
	    </div>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-6">
			<div class="col-lg-12">
		        <h3 style="color:#B34436 "><u>{{ trans('admin.thongke_o') }}</u></h3>
		    </div>
		    <table class="table table-hover">
				<thead>
					<th>{{ trans('admin.product_tk') }}</th>
					<th><span class="float-right">{{ trans('admin.qty_tk') }}</span></th>
					<th><span class="float-right">{{ trans('admin.total_price') }}</span></th>
				</thead>
				<tbody>
				@foreach($grby as $gr)
					<tr>
						<td>ccc</td>
						<td><span class="float-right">{{ $gr->sum('quantity')}}</span></td>
						<td><span class="float-right">{{ number_format($gr->sum('total')) }}</span></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ trans('admin.total_price') }}: {{ number_format($total->sum('total')) }} VNĐ
		</div>
		<div class="col-xs-6">
			<div class="col-lg-12 alert alert-info">
		        <h3>{{ trans('admin.order_st') }}</h3>
			    <p> 
		            + {{ trans('admin.order_new') }}: <span class="float-right"><b>{{ $newc }}</b> {{ trans('admin.order') }}</span> <br>
		            + {{ trans('admin.order_xl') }}: <span class="float-right"><b>{{ $handc }}</b> {{ trans('admin.order') }}</span> <br>
		            + {{ trans('admin.order_ht') }}: <span class="float-right"><b>{{ $successc }}</b> {{ trans('admin.order') }}</span> <br>
		            + {{ trans('admin.order_h') }}: <span class="float-right"><b>{{ $delc }}</b> {{ trans('admin.order') }}</span> <br>
		        </p>
		        <p><b>{{ trans('admin.order_total') }}: {{ $order }}</b></p>

		        <p class="float-right">{{ trans('admin.order_u') }}: {{ Carbon\Carbon::now() }}</p>
	        </div>
		</div>		
		
		<hr>
	</div>



</div>
@endsection()