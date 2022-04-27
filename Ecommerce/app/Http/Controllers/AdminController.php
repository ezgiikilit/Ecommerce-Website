<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Order;

use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    

    public function uploadproduct(Request $request)
    {
        $data = new product;

        $image = $request->file;

        // resmin bilgilerini al ve kendine göre ayarla
        $fullName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $onlyName = implode('', explode('.' . $extension, $fullName));
        $filename = Str::slug($onlyName) . '-' . time() . '.' . $extension;
        $imgname = $request->file->move('productimage', $filename);
        $data->image = str_replace('\\', '/', $imgname);

        $data->title = $request->title;

        $data->price = $request->price;

        $data->description = $request->description;

        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data = product::find($id);

        // ürünle birlikte resmi sil ///////////////////////
        if (!empty($data->image)) {
            $image = public_path($data->image);
            if (file_exists($image)) {unlink($image);}
        }
        //////////////////////////////////////////////////

        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully!');
    }

    public function updateview($id)
    {
       $data=product::find($id);
       return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request ,$id)
    {
        $data=product::find($id);

        $image=$request->file;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        if($image)
        {
           $imagename=$image->getClientOriginalExtension();
 
            $request->file->move('productimage',$imagename);
     
             $data->image=$imagename;
        }
       
 
         $data->title=$request->title;
 
         $data->price=$request->price;
 
         $data->description=$request->description;
 
         $data->quantity=$request->quantity;
 
         $data->save();
 
         return redirect()->back()->with('message', 'Product Updated Successfully!');
     
    }

    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder',compact('order'));
    }

    public function updatestatus($id)
    {
      $order=order::find($id);
      $order->status='delivered';
      $order->save();   
      return redirect()->back();
    
    }

   

}
