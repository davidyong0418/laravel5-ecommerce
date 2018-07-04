@include('admin/header') 
@include('admin/sidebar')
<main class="main-content p-5" role="main">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Product Edit</h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="lead">
                                                Click "Save" below to save info
                                            </p>
                                            @if(!empty($product))
                                
                                    <form action="<?php echo url('admin/product-view') ?>/edit/{{$product->id}}" method="post" accept-charset="UTF-8" class="form-horizontal" enctype='multipart/form-data'>

                                    <div class="box-body">

                                        <div class="nav-tabs-custom">

                                            <div class="tab-content fields-group">

                                                <div class="tab-pane active" id="tab-form-1">
                                                    
                                                    <div class="form-group  ">

                                                        <label for="product_name" class="col-sm-2 control-label">Product Name*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i></span> -->

                                                                <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}" class="form-control" placeholder="Input Product Name">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="description" class="col-sm-4 control-label">Product Description*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="description" name="description" value="{{$product->description}}" class="form-control" placeholder="Input Description">

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">

                                                        <label for="type" class="col-sm-4 control-label">Current Featured Image *</label>

                                                        <div class="col-sm-8">

                                                                <img src="{{url('img')}}/<?php echo $product->image; ?>" style="width:200px; height:200px;" id="blah"/>
                                                                <div>
                                                                <input type="button" onclick="trigger_upload()" class="btn btn-success waves-effect waves-light" value="Upload" />
                                                                </div>
                                                                <input type='file' onchange="readURL(this);" class="d-none" id="uploadbutton" name="userFile" />
                                                                

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="price" class="col-sm-2 control-label">Product Price*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="price" name="price" value="{{$product->price}}" class="form-control" placeholder="Input Price">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="discount_price" class="col-sm-6 control-label">Product Discount Price</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="discount_price" name="discount_price" value="{{$product->discount_price}}" class="form-control" placeholder="Input Discount Price">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="raffle_end" class="col-sm-6 control-label">Product Raffle End Date</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="raffle_end" name="raffle_end" value="{{$product->raffle_end}}" class="form-control" placeholder="Input Raffle End">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="total_ticket" class="col-sm-2 control-label">Product Total ticket</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="total_ticket" name="total_ticket" value="{{$product->total_ticket}}" class="form-control" placeholder="Input Total Ticket">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="category_id" class="col-sm-2 control-label">Category</label>

                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="category_id" id="maincategory" required="">
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" <?php if( $category->id == $product->category_id ) { echo 'selected';} ?>>
                                                                    {{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer row">

                                        {{ csrf_field() }}
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">

                                            <div class="btn-group pull-right ">
                                                <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submit">Save</button>
                                            </div>

                                            <div class="btn-group pull-right">
                                                <a href="<?php echo url('admin/product-view') ?>/edit/{{$product->id}}" class="btn btn-warning">Reset</a>
                                            </div>
                                            <div class="btn-group pull-right">
                                                <a class="btn btn-default form-history-back" href="{{url('admin/product-view')}}"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                                            </div>
                                        </div>

                                    </div>

                                    <input type="hidden" name="_previous_" value="http://laravel-admin.org/demo/users" class="_previous_">
                                    <!-- /.box-footer -->
                                </form>
                                @else
                                    <form action="<?php echo url('admin/product-view/edit/add') ?>" method="post" accept-charset="UTF-8" class="form-horizontal" enctype='multipart/form-data'>

                                    <div class="box-body">

                                        <div class="nav-tabs-custom">

                                            <div class="tab-content fields-group">

                                                <div class="tab-pane active" id="tab-form-1">
                                                    
                                                    <div class="form-group  ">

                                                        <label for="product_name" class="col-sm-2 control-label">Product Name*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i></span> -->

                                                                <input type="text" id="product_name" name="product_name" value="" class="form-control" placeholder="Input Product Name">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="description" class="col-sm-6 control-label">Product Description*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <textarea id="description" name="description" value="" class="form-control" placeholder="Input Description" row="20"></textarea>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">

                                                        <label for="type" class="col-sm-6 control-label">Current Featured Image *</label>

                                                        <div class="col-sm-8">

                                                                <img src="{{url('img/main-slider2.jpg')}}" style="width:200px; height:200px;" id="blah"/>
                                                                <div>
                                                                <input type="button" onclick="trigger_upload()" class="btn btn-success waves-effect waves-light" value="Upload" />
                                                                </div>
                                                                <input type='file' onchange="readURL(this);" class="hidden" id="uploadbutton" name="userFile" />
                                                                

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="price" class="col-sm-2 control-label">Product Price*</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="price" name="price" value="" class="form-control" placeholder="Input Price">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="discount_price" class="col-sm-6 control-label">Product Discount Price</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="discount_price" name="discount_price" value="" class="form-control" placeholder="Input Discount Price">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="raffle_end" class="col-sm-6 control-label">Product Raffle End Date</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="raffle_end" name="raffle_end" value="" class="form-control" placeholder="Input Raffle End">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="total_ticket" class="col-sm-6 control-label">Product Total ticket</label>

                                                        <div class="col-sm-8">


                                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->

                                                                <input type="text" id="total_ticket" name="total_ticket" value="" class="form-control" placeholder="Input Total Ticket">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="category_id" class="col-sm-2 control-label">Category</label>

                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="category_id" id="maincategory" required="">
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}">
                                                                    {{$category->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer row">

                                        {{ csrf_field() }}
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-8">

                                            <div class="btn-group pull-right ">
                                                <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submit">Save</button>
                                            </div>

                                            <div class="btn-group pull-right">
                                                <a href="{{url('admin/product-view/edit/add')}}" class="btn btn-warning">Reset</a>
                                            </div>
                                            <div class="btn-group pull-right">
                                                <a class="btn btn-default form-history-back" href="{{url('admin/product-view')}}"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                                            </div>
                                        </div>

                                    </div>

                                    <input type="hidden" name="_previous_" value="http://laravel-admin.org/demo/users" class="_previous_">
                                    <!-- /.box-footer -->
                                </form>
                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function trigger_upload(){
        $('#uploadbutton').click();
    }
    $(document).ready(function() {
        var options={
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
        };
        // $('#raffle_end').datepicker({format: "yyyy-mm-dd"});
        $('#raffle_end').click(function(){
            $('.input-group-append').click();
        });
        $('#raffle_end').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
        });
  });
   
</script>    
    

@include('admin/footer')