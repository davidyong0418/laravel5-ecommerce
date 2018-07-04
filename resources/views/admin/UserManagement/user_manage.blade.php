@include('admin/header')
@include('admin/sidebar')
<main class="main-content p-5" role="main">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>User Management</h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        
                                        
                                        <div class="col-lg-12 pb-5">
                                           
                                            <div class="table-responsive">
                                                <table id="datatable-1" class="table table-datatable table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Sr.No.</th>
            <th class="text-center">User Name</th>
            <th class="text-center">E-mail</th>
            <th class="text-center">State</th>
            <!-- <th class="text-center">Password</th> -->
            <th class="text-center">Created at</th>
            <th class="text-center">Updated at</th>
            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @if(!empty($users))
      @php($a = 1)
    @foreach($users as $value)
        <tr>
            <td style="text-align:center;">{{$a++}}</td>
            <td style="text-align:center;">{{$value->name}}</td>
            <td style="text-align:center;">{{$value->email}}</td>
            <!-- <td style="text-align:center;">1</td> -->
            <td style="text-align:center;"><span class="badge badge-success">Login</span></td>
            <td style="text-align:center;">{{$value->created_at}}</td>
            <td style="text-align:center;">{{$value->updated_at}}</td>
            <td style="text-align:center;">
                    <a href="<?php echo url('admin/user-manage') ?>/edit/{{$value->id}}"  class="user-manage-actions">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- <a href="">
                        <i class="fa fa-eye"></i>
                    </a> -->
                    <a data-id="{{$value->id}}" class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal" >
                        <i class="fa fa-trash"></i>
                    </a>
                                    
            </td>
        </tr>
            @endforeach
    @else
    <tr>
            <td class="text-center" colspan="7">No data found</td>
          
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
        <div class="modal-dialog modal-dialog-centered">
        
        <!-- Modal content-->
            <div class="modal-content modal-user-delete ">
                <form action="{{url('admin/user-manage')}}" method="post" accept-charset="UTF-8"pjax-container="">
                    {{ csrf_field() }}
                    <input type="hidden" name="delete_id" class="delete_modal_id" />
                    <div class="modal-header custom-modal-header">
                        
                        <h4 class="modal-title">Modal title</h4>
                        <button type="submit" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                            <div class="text-center">
                                <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                <p>Are you sure to delete this user?
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
    // $('#user-manage-table').DataTable();
    $('.grid-row-delete').click(function() {
        $('.delete_modal_id').val($(this).data('id'));
    });
    var addbutton = `<div class="btn-group pull-right add-product-btn"><a href="{{url('admin/product-view/edit/add')}}" class="btn btn-success pull-right">Add</a></div>`;
    $('#user-manage-table_filter').after(addbutton);
});
 
</script>
                    
@include('admin/footer')
