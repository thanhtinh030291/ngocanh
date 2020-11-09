@extends('computer.master')
@section('title','Sản phẩm')
@section('content')
    <!-- /.col-lg-12 -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.product')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <form action="{{ $pro->id }}" method="post" name="edit_pro_form" enctype="multipart/form-data">
        <div class="col-lg-8" style="padding-bottom:70px">        
            @if(session('thongbao'))
                <div class="alert-tb alert alert-success">
                    <span class="fa fa-check"> </span> {{ session('thongbao') }}
                </div>
            @endif 
            @if(session('loi'))
                <div class="alert-tb alert alert-danger">
                    <span class="fa fa-exclamation-circle"> </span> {{ session('loi') }}
                </div>
            @endif 
            @if(count($errors)>0)
                <div class="alert-tb alert alert-danger">
                    @foreach($errors->all() as $err)
                      <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                    @endforeach
                </div>
            @endif     
            <input type="hidden" name="_token" value="{{ csrf_token()  }}" />
            <input type="hidden" name="nnidproduct" value="{{ $pro->id }}" />
                <div class="form-group">
                    <label>{{ trans('admin.name')}}</label>
                    <input class="form-control" name="name" placeholder=" " value="{{ old('name', isset($product)?$product->name : null )  }}" />
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.slug')}}</label>
                    <input class="form-control" name="slug" placeholder=" " value="{{ old('slug', isset($product)?$product->slug : null )  }}" />
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.unit')}}</label>
                    <input class="form-control" name="txtUnit" placeholder=" " value="{{ old('txtUnit', isset($product)?$product->currency : null )  }}" />
                </div>

                <div class="form-group">
                    <label>{{ trans('admin.price_le')}}</label>
                    <input class="form-control" name="txtPrice" placeholder=" " value="{{ old('txtPrice', isset($product)?$product->price : null )  }}"/>
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.price_si')}}</label>
                    <input class="form-control" name="txtPrice2" placeholder=" " value="{{ old('txtPrice2', isset($product)?$product->price_to_sale : null )  }}"/>
                </div>
                <div class="form-group">
                    <label>Link Video</label>
                    <input class="form-control" name="txtlink_video" placeholder=" " value="{{ old('txtlink_video', isset($product)?$product->link_video : null )  }}"/>
                </div>
                <!-- <div class="form-group">
                    <label>{{ trans('admin.intro')}}</label>
                    <textarea class="form-control" rows="3" name="txtDescription" >{{ old('txtDescription', isset($product)?$product->description : null )  }}</textarea>
                </div> -->
                <div class="form-group">
                    <label>{{ trans('admin.intro')}}</label>
                    <textarea class="form-control" rows="8" name="txtDescription">{{ old('txtDescription', isset($product)?$product->description : null )  }}</textarea>
                    {{-- <script type="text/javascript">ckeditor("txtDescription") </script> --}}
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.content')}}</label>
                    <textarea class="form-control" rows="3" name="txtContent">{{ old('txtContent', isset($product)?$product->content : null )  }}</textarea>
                    <script type="text/javascript">ckeditor("txtContent") </script>
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.keyword')}}</label>
                    <input class="form-control" name="txtKeywords" placeholder=" " value="{{ old('txtKeywords', isset($product)?$product->keywords : null )  }}" />
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.price_not_sale')}}</label>
                    <input class="form-control" name="price_no_sale" placeholder=" " value="{{ old('price_no_sale', isset($product)?$product->    price_compare : null )  }}"/>
                </div>                
                <button type="submit" class="btn btn-info">{{ trans('admin.update')}}</button>
                <button type="reset" class="btn btn-default">Reset</button>
            
        </div>
        <div class="col-md-4">
        <label>{{ trans('admin.image')}}</label></br>
            <img id="ennavatar" src="{{ asset('public/img/product/'.$pro->image) }}" class="img-thumbnail" style="width: 100%;">
            <hr>
            @foreach($pimage as $im)
            <div class="col-xs-6 form-group edit_form_img" id="{{ $im->id }}" >
                <img src="{{ asset('public/img/product/Pdetail/'.$im->image)  }}"  class="edit_pimage" idhinh="{{ $im->id  }}" id="{{  $im->id  }}" >
                <a href="javascript:void(0)" id="delete_img" class="btn btn-danger btn-circle incon_del"><i class="fa fa-close"></i></a>
            </div>            
            @endforeach()
            <button type="button" class="btn btn-primary" id="addImage">{{ trans('admin.add')}} {{ trans('admin.image')}}</button>
            <div id="edit_insert_img"></div>
        </div>
    <form>
</div>
@endsection()

@section('script')
  <script src="{{ asset('public/js/admin/addcontentpro.js') }}"></script>
@endsection()
<style type="text/css">
    .edit_form_img{
        position: relative;
    }
    .edit_form_img img{
        height: 100px;
        width: 100%;
    }
    .edit_pimage{
        width: 150;
        height: auto;
        margin-bottom:10px; 
    }
    .incon_del{
        position: absolute;
        top:5px;
        left: 5px;

    }
    #addImage{
        margin-top: 5px;
        margin-bottom: 10px;
    }
</style>    