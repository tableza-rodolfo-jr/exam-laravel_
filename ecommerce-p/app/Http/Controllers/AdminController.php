<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
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

     public function delete_category($id) {
       $data = category::find($id);

       $data->delete();

       return redirect()->back()->with('message', 'Succesfully deleted');
     }

     public function add_category(Request $request) {
         
        $data = new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');

     }

}
