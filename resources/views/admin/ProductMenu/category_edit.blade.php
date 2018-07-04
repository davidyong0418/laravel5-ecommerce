@include('admin/header') 
@include('admin/sidebar')
<main class="main-content p-5" role="main">
    <div class="row">
        <div class="col-md-12">
            @if(!empty($category))
            <h1>Category Edit</h1>
            @else
            <h1>Add Category</h1>
            @endif
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                        @if(session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif
                        @if($errors->has())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                  
                                </div>
                            @endforeach
                        @endif
                
                @if(!empty($category))
                <form class="form-horizontal" action="<?php echo url('admin/category-view') ?>/edit/{{$category->id}}" id="category-form" method="post" accept-charset="UTF-8"  pjax-container="">
                    <input type="hidden" class="new_category_input" value="{{$category->id}}">
                    <div class="box-body">

                        <div class="nav-tabs-custom">

                            <div class="tab-content fields-group">

                                <div class="" id="tab-form-1">
                                    
                                    <div class="form-group row ">

                                        <label for="name" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-8">
                                            <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i></span> -->

                                            <input type="text" id="name" name="name" value="{{old('name', null) === null ?  $category->category_name : old('name')}}" class="form-control name" placeholder="Category Name" required="">

                                        </div>
                                    </div>


                                    <div class="form-group row">

                                        <label for="type" class="col-sm-2 col-form-label">Type</label>

                                        <div class="col-sm-8">

                                            <select class="form-control" name="type" id="type" required="">
                                                
                                                <option value="1" @if((old('type', null) === null && $category->category_type==1) || old('type', null) == 1) selected @endif >
                                                Normal
                                                </option>
                                                <option value="2" @if((old('type', null) === null && $category->category_type==2) || old('type', null) == 2) selected @endif >
                                                Featured
                                                </option>
                                                    
                                            </select>
                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->


                                        </div>
                                    </div>
                                    <div class="form-group row  ">

                                        <label for="ordering" class="col-sm-2 col-form-label">Ordering</label>

                                        <div class="col-sm-8">
                                            <input type="number" id="ordering" name="ordering" value="{{old('ordering', null) === null ?  $category->ordering : old('ordering')}}" class="form-control ordering" placeholder="Ordering" required="">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div>
                                                <p class="sub_menu_header">Sub Categories<p>
                                            </div>
                                            <div class="card">
                                               
                                                <div class="card-header">
                                                     <h5 class="float-left sub_category_name_title">Sub Category Name</h5>
                                                    <input type="text" class="form-control ordering col-sm-4 float-left add-subcategory-input"  />
                                                    
                                                    <input type="hidden" name="distinct_action" id="add_submenu_hidden" />
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a class="btn btn-success" id="add-subcategory" style="margin-top: 3px;">Add</a>
                                                </div>
                                                <div class="card-table table-responsive">
                                                    <table class="table table-hover align-middle">
                                                        <thead class="thead-light" style="display:
                                                        <?php if (empty($submenu)) {
                                                           echo 'none';
                                                        }?> ">
                                                            <tr>
                                                                <th class="sub_menu_th text-center">Sub Category</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if(!empty($submenu))
                                                            @foreach($submenu as $submenu_item)
                                                                <tr class="submenu_tr_class">
                                                                <td class="sub-category-name text-center">{{$submenu_item->category_name}}</td>
                                                                <td class="text-center">
                                                                    <a class="user-manage-actions update_submenu"  data-toggle="modal" data-target="#UpdateModal" >
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a data-id="{{$category->id}}" class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    <input type="hidden" name="sub_category_ordering" class="sub-category-ordering" value="{{$submenu_item->ordering}}">
                                                                </td>
                                                                    <input type="hidden" class="h-done sub_menu_id" value="{{$submenu_item->id}}">
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

                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- /.box-body -->
                    <div class="box-footer row">
                    
                        {{ csrf_field() }}
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-9">

                            <div class="btn-group pull-right ">
                                <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submit">Save</button>
                            </div>

                            <div class="btn-group pull-right">
                                <a href="<?php echo url('admin/category-view') ?>/edit/{{$category->id}}" class="btn btn-warning">Reset</a>
                            </div>
                            <div class="btn-group pull-right">
                                <a class="btn btn-default form-history-back" href="{{url('admin/category-view')}}"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="_previous_" value="http://laravel-admin.org/demo/users" class="_previous_">
                    <!-- /.box-footer -->
                </form>
                @else
                <form action="<?php echo url('admin/category-view/edit/add') ?>" method="post" accept-charset="UTF-8" class="form-horizontal" pjax-container="">
                    <input type="hidden" class="new_category_input" value="no id">
                    <div class="box-body">
                        <input type="hidden" name="add" class="d-none" value="add" />
                        <div class="nav-tabs-custom">

                            <div class="tab-content fields-group">

                                <div class="" id="tab-form-1">
                                    
                                    <div class="form-group row  ">

                                        <label for="name" class="col-sm-2 col-form-label">Name</label>

                                        <div class="col-sm-8">


                                                <!-- <span class="input-group-addon"><i class="fa fa-pencil"></i></span> -->

                                                <input type="text" id="name" name="name" class="form-control name" placeholder="Category Name" value="{{old('name')}}" required="">

                                        </div>
                                    </div>


                                    <div class="form-group row">

                                        <label for="type" class="col-sm-2 col-form-label">Type</label>

                                        <div class="col-sm-8">

                                                <select class="form-control" name="type" id="type" required="">
                                                    
                                                    <option value="1" @if(old('type')==1) selected @endif>
                                                    Normal
                                                    </option>
                                                    <option value="2" @if(old('type')==2) selected @endif>
                                                    Featured
                                                    </option>
                                                    
                                            </select>
                                                <!-- <span class="input-group-addon"><i class="fa fa-envelope"></i></span> -->


                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="ordering" class="col-sm-2 col-form-label">Ordering</label>

                                        <div class="col-sm-8">
                                                <input type="number" id="ordering" name="ordering" value="{{old('ordering')}}" class="form-control ordering" placeholder="Ordering" required="">
                                                <input type="hidden" name="sub_ordering" class="sub-ordering">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <div class="col-sm-12">
                                            <div>
                                                <p class="sub_menu_header">Sub Categories<p>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                   <h5 class="float-left sub_category_name_title">Sub Category Name</h5>
                                                    <input type="text" class="form-control ordering col-sm-4 float-left add-subcategory-input"  />
                                                    
                                                    <input type="hidden" name="distinct_action" id="add_submenu_hidden">
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a class="btn btn-success " id="add-subcategory" style="margin-top: 3px;">Add</a>
                                                </div>
                                                <div class="card-table table-responsive">
                                                    <table class="table table-hover align-middle">
                                                        <thead class="thead-light" style="display:
                                                       none ">
                                                            <tr >
                                                                <th class="sub_menu_th text-center">Sub Category</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- /.box-body -->
                    <div class="box-footer row">

                        {{ csrf_field() }}
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-9">

                            <div class="btn-group pull-right ">
                                <button type="submit" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submit">Save</button>
                            </div>

                            
                            <div class="btn-group pull-right">
                                <a class="btn btn-default form-history-back" href="{{url('admin/category-view')}}"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
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



<div class="modal fade" id="UpdateModal" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content modal-user-delete ">
    <input type="hidden" name="delete_id" class="delete_modal_id" />
    <div class="modal-header custom-modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="submit" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
            <div class="text-left">
                <h6 style="display:none;" class="modal-subcategory-name">Sub category that has this name has existed.please add again.</h6>
                <label class="col-sm-12 col-form-label">Sub Category Name</label>
                <input type="text" id="sub_menu_text" class="form-control" placeholder="Sub Name" required="" />
                <label class="col-sm-12 col-form-label">Ordering</label>
                <input type="number" id="sub_menu_ordering" class="form-control" placeholder="Sub Ordering" required="" />
            </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-success waves-effect waves-light" id="update_modal_submenu">Update
            <i class="fa fa-diamond ml-1"></i>
        </a>
        <a class="btn btn-default" data-dismiss="modal">Cancel</a>
    
    </div>
</div>

</div>
</div>

<div class="modal fade add-again" id="add-again" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content modal-user-delete ">
    <input type="hidden" name="delete_id" class="delete_modal_id" />
    <div class="modal-header custom-modal-header">
        <h4 class="modal-title">Sub category has existed</h4>
        <button type="submit" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
            <div class="text-center">
               <label>Sub category that has this name has existed.please add again.</label>
            </div>
    </div>
    <div class="modal-footer">
       
        <a class="btn btn-default" data-dismiss="modal">I know</a>
    
    </div>
</div>

</div>
</div>

    <script type="text/javascript">
        $('document').ready(function(){
            var change_submenu_item ="";
            var change_submenu_item_id ="";
            var change_submenu_tr = "";
            $(document).on('click', '.user-manage-actions', function() {
                $('.modal-subcategory-name').hide();
                change_submenu_tr = $('.submenu_tr_class').has(this);
                change_submenu_item = $('.submenu_tr_class').has(this).find('.sub-category-name');
                var value = change_submenu_item.text();
                change_submenu_item_id = $('tr').has(this).find('.sub_menu_id').val();
                $('#sub_menu_text').val(value);
                $('#sub_menu_ordering').val(change_submenu_tr.find('.sub-category-ordering').val());

             }) ;



            $(document).on('click', '.grid-row-delete', function() {
                var delete_id = $('tr').has(this).find('.sub_menu_id').val();
                var delete_item = $('tr').has(this);

                if (delete_id == 'new')
                {
                    delete_item.remove();
                    if($('.card-table tbody tr').length == 1)
                    {
                        $('.card-table .thead-light').hide();
                    }
                    return;
                }
                $.ajax({
                      type: "POST",
                      url: $('#category-form').attr('action'),
                      data: {
                        'delete_id': delete_id,
                        'submenu_edit' : 'edit',
                        "_token": "{{ csrf_token() }}",
                      },
                      success: function(){
                            delete_item.remove();
                      }
                });
             }) ;
            
            $(document).on('click', '#update_modal_submenu', function() {
                var add_subcategory_name = $('#sub_menu_text').val();
                var existed_flag = true;
                console.log(add_subcategory_name);
                $('.sub-category-name').not($(change_submenu_item)).each(function(index){
                    var sub_category_name = $(this).text();
                    if(sub_category_name == add_subcategory_name ){
                        existed_flag = false;
                    }
                });
                if(existed_flag == false)
                {
                    $('.modal-subcategory-name').show();

                    return;
                }
                if(change_submenu_item_id == 'new')
                {
                    change_submenu_item.next('.new_add_id').val($('#sub_menu_text').val());
                    change_submenu_item.text($('#sub_menu_text').val());
                    change_submenu_tr.find('.sub-category-ordering').val($('#sub_menu_ordering').val());
                    $('.modal-subcategory-name').hide();
                    $('#UpdateModal').modal('hide');
                    return;
                }
                $('.modal-subcategory-name').hide();
                $('#UpdateModal').modal('hide');
                    $.ajax({
                          type: "POST",
                          url: $('#category-form').attr('action'),
                          data: {
                                'submenu':$('#sub_menu_text').val(),
                                'id' : $('.grid-row-delete').attr('id'),
                                'change_id' : change_submenu_item_id,
                                'submenu_edit' : 'edit',
                                "_token": "{{ csrf_token() }}",
                                'ordering': $('#sub_menu_ordering').val(),
                          },
                          success: function(){
                                change_submenu_item.text($('#sub_menu_text').val());
                                window.location.reload();
                          }
                        });
            });
            var i=0;
            $('#add-subcategory').click(function(){
                var add_subcategory_name = $('.add-subcategory-input').val();
                var existed_flag = true;
                if( add_subcategory_name == ""){
                    return;
                }
                $('.sub-category-name').each(function(index){
                    var sub_category_name = $(this).text();
                    if(sub_category_name == add_subcategory_name ){
                        existed_flag = false;
                    }
                });
                if (existed_flag == true)
                {
                    
                    
                    var template = `<tr class="submenu_tr_class">                                                                          <td class="sub-category-name text-center">`+add_subcategory_name+`</td><input type="hidden" class="h-done new_add_id" name="new_add_id[`+i+`]" value="`+add_subcategory_name+`">
                                                            <td class="text-center">              <a class="user-manage-actions update_submenu"  data-toggle="modal" data-target="#UpdateModal" >
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <input type="hidden" name="sub_category_ordering[`+i+`]" class="sub-category-ordering" value="`+ 0 +`">
                                                            </td>
                                                                <input type="hidden" class="h-done sub_menu_id" value="new">
                                                            </tr>`;
                    i++;                                           
                    $('tr').last().after(template);
                    $('#add_submenu_input').val('');
                    $('#add_submenu_input').focus();
                    $('.thead-light').show();
                }
                else{
                    $('#add-again').modal('show');
                }
                
                
               
            });
        });
    </script>

@include('admin/footer')