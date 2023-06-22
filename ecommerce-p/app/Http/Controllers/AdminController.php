<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
   public function delivered($id){
  
      $order=order::find($id);

      $order->delivery_status="delivered";
      $order->payment_status="Paid";
      $order->save();

      return redirect()->back();
   }



   public function order(){

      $order=order::all();
    return view('admin.order', compact('order'));
   }


    public function view_category() {
        $data = category::all();
        return view('admin.category', compact('data'));
     }

     public function view_product(){
        return view('admin.product');
     }
     public function add_product(Request $request){
         $product = new product;

         $product->title=$request->title;
         $product->description=$request->description;
         $product->price=$request->price;
         $product->quantity=$request->quantity;
         
         $image = $request->image;
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('product', $imagename);
         $product->image=$imagename;
         // $product->image=$request->image;

         $product->save();

         return redirect()->back()->with('message', 'Succesfully added');
     }
     public function delete_product($id){
   
      $product=product::find($id);
      $product->delete();
      return redirect()->back()->with('message', 'successfull delete');
     }

     public function delete_category($id) {
       $data = category::find($id);

       $data->delete();

       return redirect()->back()->with('message', 'Succesfully deleted');
     }
     public function update_product($id){
      $product=product::find($id);
      return view('admin.update_product', compact('product'));
     }

     public function show_product(){  


        $product = product::all();
         return view('admin.show_product', compact('product'));
     }
     
     public function update_product_confirm(Request $request, $id){
            $product=product::find($id);
         
            $product->title=$request->title;
            $product->description=$request->description;
            $product->quantity=$request->quantity;
            $product->price=$request->price;


            $image=$request->image;
            

          if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image=$imagename;
          }

          
            $product->save();

            return redirect()->back()->with('message', 'Successfully Updated');

     }
     public function add_category(Request $request) {
         
        $data = new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');

     }

}
