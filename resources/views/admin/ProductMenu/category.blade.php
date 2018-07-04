@include('admin/header')
@include('admin/sidebar')
<main class="main-content p-5" role="main">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Category</h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 pb-5">
                                            
                                        </div>
                                        
                                        <div class="col-lg-12 pb-5">
                                           
                                            <div class="table-responsive">
                                                <table id="datatable-1" class="table  table-striped table-hover">
                                                    <thead>
                                                       <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Type</th>
            <th class="text-center">Actions</th>
        </tr>
                                                    </thead>
                                                    <tbody>
      @if(!empty($categories))
      @php($a = 1)
    @foreach($categories as $category)
        <tr>
            <td >{{$category->category_name}}</td>
            @if ($category->category_type == 1)
                <td style="text-align:center;">Normal</td>
            @else
                <td style="text-align:center;">Featured</td>
            @endif
            
            <td style="text-align:center;">
                    
                    <a href="<?php echo url('admin/category-view') ?>/edit/{{$category->id}}"  class="user-manage-actions">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- <a href="">
                        <i class="fa fa-eye"></i>
                    </a> -->
                    <a data-id="{{$category->id}}" class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal" >
                        <i class="fa fa-trash"></i>
                    </a>
                                    
            </td>
        </tr>
            @endforeach
    @else
    <tr>
            <td class="text-center" colspan="7">No data found<a href="{{url('admin/category-view/edit/add')}}" class="user-manage-actions btn float-right btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                    </a></td>
          
        </tr>

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
    <div class="modal fade" id="DeleteModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content modal-user-delete ">
                <form action="{{url('admin/category-view')}}" method="post" accept-charset="UTF-8"pjax-container="">
                    {{ csrf_field() }}
                    <input type="hidden" name="delete_id" class="delete_modal_id" />
                    <div class="modal-header custom-modal-header">
                        
                        <h4 class="modal-title">Delete</h4>
                        <button type="submit" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="text-center">
                                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                <p>Are you sure to delete this category?
                                </p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Confirm
                            <i class="fa fa-diamond ml-1"></i>
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    
                    </div>
                </form>
            </div>
        
        </div>
  </div>
  <script>

  $(document).ready(function() {
    $('.grid-row-delete').click(function() {
        $('.delete_modal_id').val($(this).data('id'));
    });

    var addbutton = `<div class="btn-group pull-right add-product-btn"><a href="{{url('admin/category-view/edit/add')}}" class="btn btn-success pull-right">Add</a></div>`;

    $('#datatable-1_filter').remove();
    $('#datatable-1_length').remove();
    $('.card-body .pb-5').first().remove();
    $('.card-body .pb-5').prepend(addbutton);
    $('.card-body .pb-5 .row').last().remove();
});
 
</script>
                
@include('admin/footer')
