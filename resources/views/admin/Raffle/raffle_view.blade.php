@include('admin/header')
@include('admin/sidebar')
<main class="main-content p-5" role="main">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Raffle View</h1>
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
            <th class="text-center">Sr.No.</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
            <th class="text-center">Total Tickets</th>
            <th class="text-center">Booked Tickets</th>
            <th class="text-center">Raffle End Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
        </tr>
                                                    </thead>
                                                    <tbody>
      @if(!empty($data))
      @php($a = 1)
    @foreach($data as $value)
        <tr>
            <h2>{{$value->raffle_end}}</h2>
            <td style="text-align:center;">{{$a++}}</td>
            <td style="text-align:center;">{{$value->product_name}}</td>
            <td style="text-align:center;"><img style="width:50px;" src="{{url('img/'.$value->image)}}" alt="Product Img"/></td>
            <td style="text-align:center;">{{$value->price}}</td>
            <td style="text-align:center;">{{$value->total_ticket}}</td>
            <td style="text-align:center;">{{ $value->booked}}</td>
            <td style="text-align:center;">{{date('g:ia \o\n l jS F Y',strtotime($value->raffle_end))}}</td>
            @if($value->raffle_end < date('Y-m-d H:i:s'))
            <td style="text-align:center;color:red;">Date Over</td>
            @elseif($value->total_ticket <= $value->booked)
            <td style="text-align:center;color:blue;">Ready to Run Raffle</td>
            @else
            <td style="text-align:center;color:green;">Running</td>
            @endif
            @if($value->total_ticket <= $value->booked)
            <td style="text-align:center;"><a title="Run Ruffle" href="{{url('admin/raffle-view/edit')}}/<?php echo $value->id;?>"><img width="25px" src="{{url('admin/images/mario.gif')}}"/>&nbsp;<a title="View Tickets" href="javascript:void(0);"><i class="fa fa-search"></i></a></td>
          
            @else
            <td style="text-align:center;"><a href="javascript:void(0);"><i class="fa fa-search"></i></a></td>
            @endif
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
                <form action="{{url('admin/category-view')}}" method="post" accept-charset="UTF-8"pjax-container="">
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
    $('.grid-row-delete').click(function() {
        $('.delete_modal_id').val($(this).data('id'));
    });
});
 
</script>
                
@include('admin/footer')
