@include('admin/header')
@include('admin/sidebar')
<main class="main-content p-5" role="main">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Product</h1>
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
                                                <table id="datatable-1" class="table table-datatable table-striped table-hover">
                                                    <thead>
                                                       <tr>
            <th class="text-center">No</th>
            <th class="text-center">Image</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Price</th>
            <th class="text-center">Discount price</th>
            <th class="text-center">Raffle End Date</th>
            <th class="text-center">Total ticket</th>
            <th class="text-center">Category</th>
            <!-- <th class="text-center">Parent</th> -->
            <th class="text-center">Actions</th>
        </tr>
                                                    </thead>
                                                     <tbody>
      @if(!empty($products))
      @php($a = 1)
    @foreach($products as $product)
        <tr>
            <td style="text-align:center;">{{$a++}}</td>
            <td style="text-align:center;"><img src="{{url('img')}}/<?php echo $product->image; ?>" style="width:40px;height:40px;"/></td>
            <td style="text-align:center;">{{$product->product_name}}</td>
            <td style="text-align:center;">{{$product->description}}</td>
            <td style="text-align:center;">{{$product->price}}</td>
            <td style="text-align:center;">{{$product->discount_price}}</td>
            <td style="text-align:center;">{{$product->raffle_end}}</td>
            <td style="text-align:center;">{{$product->total_ticket}}</td>
            <td style="text-align:center;">{{$product->category_name}}</td>

            <td style="text-align:center;">
                   
                    <a href="<?php echo url('admin/product-view') ?>/edit/{{$product->id}}"  class="user-manage-actions">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- <a href="">
                        <i class="fa fa-eye"></i>
                    </a> -->
                    <a data-id="{{$product->id}}" class="grid-row-delete user-manage-actions"  data-toggle="modal" data-target="#DeleteModal" >
                        <i class="fa fa-trash"></i>
                    </a>
                                    
            </td>
        </tr>
            @endforeach
    @else
    <tr>
            <td class="text-center" colspan="7">No data found <a href="<?php echo url('admin/product-view/edit/add') ?>"  class="user-manage-actions btn float-right btn-primary btn-sm">
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
                                <p>Are you sure to delete this product?
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

    $('#datatable-1_length').append(addbutton);
});
</script>
                
@include('admin/footer')
