<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\product;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Teamspeak3;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{ 
          // Login
    public function index(Request $request){

       if($request->isMethod('post')){
           $validator = Validator::make($request->all(), [
                'email'       =>  'required|email', 
                'password'    =>  'required',
                                                         ]);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }      
          $email     = trim($request->input('email'));
          $password  = trim($request->input('password'));
          $query1    = DB::table('admin')->where('email',$email)->first();
          $checkUser = count($query1);
       if($checkUser > 0){
          $password1 = $query1->password;
       if($password == $password1){
          Session::put(['username'=>$query1]);
          session(['admin' => 'admin']);
          return redirect('/admin/dashboard');
       }else{
           Session::flash('message', 'The Email and Password you have entered did not match.');
           Session::flash('alert-class', 'alert-danger');
           session(['admin' => 'noauth']);
           return view('/admin/login');
       }
       }else{
           Session::flash('message', 'Email does not exists.');
           Session::flash('alert-class', 'alert-danger');
           session(['admin' => 'noauth']);
           return view('/admin/login');
       }
       }else{
        
        if (session('admin') == 'admin') {
          return redirect('/admin/dashboard');
        }
        else{
          session(['admin' => 'noauth']);
          return view('/admin/login');
        }
       }
    }
           //Dashboard
    public function Dashboard(){
        /*  $total_users          = DB::table('users')->where('status',1)->count();
          $pending_users        = DB::table('users')->where('status',2)->count();
          $total_college        = DB::table('college_name')->count();
          $total_course         = DB::table('course')->count();
          $total_management_cat = DB::table('category')->count();
          $total_review         = DB::table('college_ranking')->count();
          $pending_review       = DB::table('college_ranking')->where('status',2)->count();

          $data = array(    'total_users'       => $total_users,
                            'pending_users'     => $pending_users,
                            'total_college'     => $total_college,
                            'total_course'      => $total_course,
                            'total_category'    => $total_management_cat,
                            'total_review'      => $total_review,
                            'pending_review'    => $pending_review,
                        );*/
           return view('admin/dashboard');  
         //return View::make('/admin/dashboard', array('data' => $data,'review_name'=> $review_name, 'userss' =>$username ));
    }
             //Logout
    Public function Logout(Request $request){
          $request->session()->flush();
          session(['admin' => 'noauth']);
          return redirect('admin/login');
    }
    Public function forgotPassword(Request $request){
        if ($request->isMethod('post')) {
          session(['admin' => 'noauth']);
           $validator = Validator::make($request->all(), [
                'email'       =>  'required|email', 
                                                         ]);
        if ($validator->fails()) {
            return redirect('admin/forgot_password')
                        ->withErrors($validator)
                        ->withInput();
        }      
           $email = trim($request->input('email'));
           $check_email = DB::table('admin')->where('email',$email)->first();

           $count = count($check_email);
        if($count > 0){
           $admin_id  = $check_email->id;
           $id = md5($admin_id);
           $string = str_replace("/","",$id);
           $updated_Arraay = array('remember_token' => $string);
           $update_data = DB::table('admin')->where('id',$admin_id)->update($updated_Arraay) ;
           $url = url('admin/reset_password/'.$string);
           $data = ['url' => $url,'type'=>'Admin'];
           Mail::send('admin/forget_pwd_page',$data , function ($m) use ($email) {
           $m->from('expinatortesting@gmail.com', 'Raffle');
           $m->to($email,' Admin')
           ->subject('Forgot Password Request');
              });
           Session::flash('message', "The link has been sent to your registered email address.");
           Session::flash('alert-class', 'alert-success');
           session(['admin' => 'noauth']);
           return redirect('admin/login');
           }else{
           Session::flash('message', 'The Email you have entered is invalid.');
           Session::flash('alert-class', 'alert-danger');
           session(['admin' => 'noauth']);
           return redirect('admin/forgot_password');
           }
           }else{
           return view('admin/forgotpassword');
       }
    }
    Public function resetPassword(Request $request){
          $token = $request->string;
          if($request->isMethod('post')){
          $validator = Validator::make($request->all(), [
                'password'       =>  'required',
                'confpassword'   =>  'required|same:password',
                                                     ]);
          if ($validator->fails()) {
            return redirect('admin/reset_password/'.$token)
                        ->withErrors($validator)
                        ->withInput();
          }      
            $check_token = DB::table('admin')->where('remember_token',$token)->get();
          $count = count($check_token);
          if($count >0){
          $admin_id = $check_token[0]->id;
          $password = $request->input('password');
          $updatedArray = array('password'=>$password,'remember_token'=>'');
          $updatePassword = DB::table('admin')->where('id',$admin_id)->update($updatedArray);
          
          Session::flash('message', 'Your New Password Set Successfully.');
          Session::flash('alert-class', 'alert-danger');
          return redirect('admin/login');
          
          }else{
          Session::flash('message', 'Your Token has Expired.');
          Session::flash('alert-class', 'alert-danger');
          return redirect('admin/login');
          }
          }else {
          return view('admin/resetpassword');
          }
    }
    public function RaffleView(Request $request){
           $foo  = new product();
           $product = $foo->all_data();

        foreach ($product as $key => $value) {
           $value->booked = DB::table('payments')->where('product_id',$value->id)->count();
         } 
           return view('admin/Raffle/raffle_view',array('data'=>$product));
         
    }
    public function RaffleViewEdit(Request $request){

        if($request->isMethod('post')){
            $info = pathinfo($_FILES['userFile']['name']);
            DB::table('products')
                ->where('id',$request->id)
                ->update([
                    'product_name'=> $request->product_name,
                    'price'=> $request->price,
                    'total_ticket' => $request->total_ticket,
                    'raffle_end' => $request->raffle_end,
                    'image' => $info['basename']
                ]);
            $target = 'img/'.$info['basename'];
            move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
        }
            
            $id = $request->id;
            $foo  = new product();
            $product = $foo->get_data_by_id($id)[0];
            $booked_ticket = DB::table('payments')->where('product_id',$id)->count();
            return view('admin/Raffle/raffle_edit',array('product'=>$product, 'booked_ticket'=>$booked_ticket));
        }















    public function Raffle(Request $request,$productID){
            $foo     = new product();
            $product = $foo->all_data_by_id($productID);
      foreach ($product as $key => $value) {
         $value->user = DB::table('users')->where('id',$value->user_id)->first();
      }
          return view('admin/run_raffle',array('data'=>$product));
    }
    public function Round1(Request $request){
         $data  = $_POST;
         print_r($data);
        foreach ($data as $key => $value) {
      
     
          $insertArray =  array('product_id' => $value['product_id'],
                                'pos'        => $value['pos'][0],
                                'user_ticket'=> $value['order'][0],
                                'user_name'  => $value['name'][0]
                               );

         $result =  DB::table('raffle_winner')->insert($insertArray);
        }

     
    }
    // Admin user manage controller
    public function UserManage(Request $request)
    {
        if($request->isMethod('post')){
            DB::table('users')
                    ->where('id', $request->delete_id)
                    ->delete();
            
        }
        $users = DB::table('users')->get();
        return view('admin/UserManagement/user_manage',array('users' => $users));
    }
    public function UserManageEdit(Request $request)
    {
        if($request->isMethod('post')){
                DB::table('users')
                    ->where('id', $request->id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email                        
                    ]);
                return redirect('admin/user-manage');
        }
        else{
            $user = DB::table('users')->where('id', $request->id)->first();
            return view('admin/UserManagement/user_manage_edit',array('user' => $user));
        }
        
    }


    public function CategoryManage(Request $request)
    {
        if($request->isMethod('post')){
          //delete category
          if(!empty($request->delete_id)){
            DB::table('category')
                    ->where('id', $request->delete_id)
                    ->delete();
          }
          else{
            // create category
            if(empty($request->parent)){
                DB::table('category')->insert([
                    'category_name' => $request->name,
                    'category_type'=> $request->type,
                    'parent' => 0,
                    'ordering' => $request->ordering
                ]);
            }
            else{
              // create sub category
              DB::table('category')->insert([
                    'category_name' => $request->name,
                    'category_type'=> $request->type,
                    'parent'=> $request->parent,
                    'ordering' => 0
              ]);
            }
          }
            
        }
        // get category data in category page
        $categories = DB::table('category')
                      ->where('parent','0')
                      ->orderBy('ordering')
                      ->get();
//print_r($categories);exit;
        return view('admin/ProductMenu/category',array('categories' => $categories));
        
    }
    public function CategoryManageEdit(Request $request)
    {
        if($request->isMethod('post')){

              if (!empty($request->check_str)) {
                $check_str = DB::table('category')
                    ->where('parent','=',$request->id)
                    ->where('category_name','=',$request->check_str)
                    ->first();
                    if(empty($check_str)){
                      DB::table('category')->insert([
                        'category_name' => $request->check_str,
                        'category_type' => 1,
                        'parent' => $request->id,
                        'ordering' => 0,
                      ]);
                      return 'No equal';
                    }
                    else{
                      return 'equal';
                    }
              }

              
              // action when editing subcategory in edit category page
              if (!empty($request->submenu_edit)){
                //  update sub category
                if(!empty($request->submenu))
                {

                  DB::table('category')
                      ->where('id', $request->change_id)
                      ->update([
                          'category_name' => $request->submenu,
                          'ordering'=> $request->ordering
                      ]);
                      return 'success';
                }
                //  delete sub category
                if(!empty($request->delete_id))
                {
                  DB::table('category')
                      ->where('id', $request->delete_id)
                      ->delete();
                      return 'delete';
                }
              }

          // Update category in edit category
              $id = $request->id;
              if ($request->id == 'add') {      
                  $db_category = DB::table('category')
                      ->where('parent','=',0)
                      ->where('category_name','=',$request->name)
                      ->first();  
                  if($db_category){
                      return redirect('admin/category-view/edit/add')->withInput()->withErrors(array('message' => 'The name already exists.'));
                  }else{
                      $id = DB::table('category')->insertGetId([
                          'category_name' => $request->name,
                          'category_type' => $request->type,
                          'parent' => '0',
                          'ordering' => $request->ordering,
                      ]);
                      
                      if(!empty($request->new_add_id)){
                        // create new sub category in edit category page
                        foreach ($request->new_add_id as $key=> $value) {
                           DB::table('category')->insert([
                              'category_name' => $request->new_add_id[$key],
                              'category_type' => $request->type,
                              'parent' => $id,
                              'ordering' => $request->sub_category_ordering[$key],
                          ]);
                         }
                      }
                      return redirect('admin/category-view/edit/add')->with('success_message', 'Successfully added a category.');
                  }
              }
              else{
                  $db_category = DB::table('category')
                      ->where('category_name','=',$request->name)
                      ->where('id','<>',$request->id)
                      ->first();  
                  if($db_category){
                      return redirect('admin/category-view/edit/'.$id)->withInput()->withErrors(array('message' => 'The name already exists.'));
                  }else{
                      DB::table('category')
                                ->where('id', $id)
                                ->update([
                                    'category_name' => $request->name,
                                    'category_type' => $request->type,
                                    'ordering'=>$request->ordering
                                ]);
                      if(!empty($request->new_add_id)){
                        // create new sub category in edit category page
                        foreach ($request->new_add_id as $key=> $value) {
                           DB::table('category')->insert([
                              'category_name' => $request->new_add_id[$key],
                              'category_type' => $request->type,
                              'parent' => $id,
                              'ordering' => $request->sub_category_ordering[$key],
                          ]);
                         }
                      }
                      return redirect('admin/category-view/edit/'.$id)->with('success_message', 'Successfully updated this category.');
                  }                      
              }
              
        }
        else
        {
          // get data from category id in edit page
            $category = DB::table('category')
                    ->where('id', $request->id)
                    ->first();
            $submenu = DB::table('category')->where('parent', $request->id)->orderBy('ordering')->get();
            return view('admin/ProductMenu/category_edit',array('category' => $category,'submenu' => $submenu));
        }
        
    }
    public function ProductManage(Request $request)
    {
        if($request->isMethod('post')){
            DB::table('products')
                    ->where('id', $request->delete_id)
                    ->delete();
        }
        $products = DB::table('products')
                    ->select('products.*','category.category_name')
                    ->leftJoin('category','category.id', '=', 'products.category_id')
                    ->get();
        return view('admin/ProductMenu/product',array('products' => $products));
        
    }
    public function ProductManageEdit(Request $request)
    {
        if($request->isMethod('post')){
            if( $request->id == 'add')
            {
                $info = pathinfo($_FILES['userFile']['name']);
                DB::table('products')->insert([
                    'product_name' => $request->product_name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'discount_price' => $request->discount_price,
                    'raffle_end' => $request->raffle_end,
                    'total_ticket' => $request->total_ticket,
                    'category_id' => $request->category_id,
                    'image' => $info['basename']
                ]);
                $target = 'img/'.$info['basename'];
                move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);
                return redirect('admin/product-view');
            }
            else{
                $info = pathinfo($_FILES['userFile']['name']);
                DB::table('products')
                    ->where('id', $request->id)
                    ->update([
                        'product_name' => $request->product_name,
                        'description' => $request->description,
                        'price' => $request->price,
                        'discount_price' => $request->discount_price,
                        'raffle_end' => $request->raffle_end,
                        'total_ticket' => $request->total_ticket,
                        'category_id' => $request->category_id,
                        'image' => $info['basename']                  
                    ]);
                    $target = 'img/'.$info['basename'];
                    move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);

                return redirect('admin/product-view');
            }
        }
        else{
            $product = DB::table('products')
                    ->select('products.*','category.category_name')
                    ->leftJoin('category', 'category.id', '=', 'products.category_id')
                    ->where('products.id', $request->id)->first();
            $categories = DB::table('category')->get();
           

            return view('admin/ProductMenu/product_edit',array('product' => $product,'categories' => $categories));
        }
        
    }
    
}
