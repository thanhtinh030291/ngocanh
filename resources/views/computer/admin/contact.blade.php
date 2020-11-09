@extends('computer.master')
@section('title','info')
@section('content')
    <!-- /.col-lg-12 -->
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.contact')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	<form action="" method="POST" enctype="multipart/form-data">
	    <div class="col-lg-12" style="padding-bottom:120px">
	    	@if(session('thongbao'))
	            <div class="alert-tb alert alert-success">
	                <span class="fa fa-check"> </span> {{ session('thongbao') }}
	            </div>
	        @endif 
	        @if(count($errors)>0)
                <div class="alert-tb alert alert-danger">
                    @foreach($errors->all() as $err)
                      <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                    @endforeach
                </div>
            @endif      
	        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />  
	            <div class="form-group">
	                <label>{{ trans('admin.map')}}</label>
	                <input class="form-control" name="txtMap" placeholder="" value="{!! $contact['map'] !!}" />
	            </div>
	            <div class="form-group">
	                <label>{{ trans('admin.name_company')}}</label>
	                <input class="form-control" name="txtNameCo" placeholder="" value="{!! $contact['nameco'] !!}" />
	            </div>
	            <div class="form-group">
	                <label>{{ trans('admin.address_company')}}</label>
	                <input class="form-control" name="txtAddress" placeholder="" value="{!! $contact['address'] !!}" />
	            </div>
	            <div class="form-group">
	                <label>{{ trans('admin.phone')}}</label>
	                <input class="form-control" name="txtPhone" placeholder="" value="{!! $contact['phone'] !!}" />
	            </div>
	            <div class="form-group">
	                <label>{{ trans('admin.email')}}</label>
	                <input class="form-control" name="txtMail" placeholder="" value="{!! $contact['mail'] !!}" />
	            </div>
	            <div class="form-group">
	                <label>{{ trans('admin.time_work')}}</label>
	                <input class="form-control" name="txtTime" placeholder="" value="{!! $contact['time'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Fanpage Facebook</label>
	                <input class="form-control" name="txtFanpage" placeholder="" value="{!! $contact['fanpage'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>{{ trans('admin.copyright')}}</label>
	                <input class="form-control" name="txtWebsite" placeholder="" value="{!! $contact['website'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Slogan</label>
	                <textarea class="form-control" rows="3" name="txtSlogan">{!! old('txtSlogan', isset($contact)?$contact['slogan'] : null ) !!}</textarea>
	                <script type="text/javascript">ckeditor("txtSlogan") </script>
	            </div>
	            <div class="form-group">
	                <label>Slogan intro</label>
	                <textarea class="form-control" rows="3" name="txtSloganIntro">{!! old('txtSloganIntro', isset($contact)?$contact['slogan_intro'] : null ) !!}</textarea>
	                <script type="text/javascript">ckeditor("txtSloganIntro") </script>
	            </div>
	            <hr>
	            <h3>{{ trans('admin.info')}} Paypal</h3>
	            <div class="form-group">
	                <label>Api Username</label>
	                <input class="form-control" name="api_username" placeholder="" value="{!! $contact['api_username'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Api Password</label>
	                <input class="form-control" name="api_password" placeholder="" value="{!! $contact['api_password'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Api Signature</label>
	                <input class="form-control" name="api_signature" placeholder="" value="{!! $contact['api_signature'] !!}" />
	            </div> 


	            <hr>
	            <h3>{{ trans('admin.info')}} SEO</h3>
	            <div class="form-group">
	                <label>Seo title</label>
	                <input class="form-control" name="seo_title" placeholder="" value="{!! $contact['seo_title'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Keyword</label>
	                <input class="form-control" name="seo_keyword" placeholder="" value="{!! $contact['seo_keyword'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Description</label>
	                <input class="form-control" name="seo_description" placeholder="" value="{!! $contact['seo_description'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Seo Image</label>
	                <div>
	                    <img id="nnseoimage" src="{{ asset($contact['seo_image']) }}" alt="..." class="img-thumbnail" style="width: 50%;">
	                    <input type="file" name="seo_image" id="seo_image" onchange="showimg(this);">
                    </div>
	            </div> 

	            <hr>
	            <h3>{{ trans('admin.info')}} SEO</h3>
	            <div class="form-group">
	                <label>Facebook APP ID</label>
	                <input class="form-control" name="fb_app_id" placeholder="" value="{!! $contact['fb_app_id'] !!}" />
	            </div> 
	            <div class="form-group">
	                <label>Google Analyst</label>
	                <textarea class="form-control" name="google_analyst">{!! $contact['google_analyst'] !!}</textarea>
	            </div> 

	            <button type="submit" class="btn btn-info">{{ trans('translate.update')}}</button> 
	        
	    </div>
	</form>
</div>
@endsection()
 
@section('script') 
  <script type="text/javascript">

  function showimg(input) { 
  	if (input.files && input.files[0]) { 
	    var reader = new FileReader();
	    reader.onload = function (e) {
	      $('#nnseoimage')
	        .attr('src', e.target.result);
	    };
	    reader.readAsDataURL(input.files[0]);
	  }
	} 
  </script>
@endsection()