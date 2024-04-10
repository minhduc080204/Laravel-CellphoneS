<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders1 = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }])->where('Status', 0)->where('Delivered', 0)->where('UserID', app('userID'))->get();

        $orders2 = Orders::with(['orderDetails.product'=>function($query){
                $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }])->where('Status', 1)->where('Delivered', 0)->where('UserID', app('userID'))->get();

        $orders3 = Orders::with(['orderDetails.product'=>function($query){
                $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }])->where('Status', 1)->where('Delivered', 1)->where('UserID', app('userID'))->get();

        return view("carts.deliver", compact("orders1","orders2","orders3"));
    }
    public function unorder(Request $request){        
        if($request->ajax()){
            $OrderID=$request->input('OrderID');
            Orders::where('OrderID', $OrderID)->delete();
            return response()->json();
        }else{
            return redirect()->route('home.route');
        }
    }
    public function okorder(Request $request){        
        if($request->ajax()){
            $OrderID=$request->input('OrderID');
            $order = Orders::where('OrderID', $OrderID)->first();
            $order->update(['Status' => 1]);
            return response()->json();
        }else{
            return redirect()->route('home.route');
        }
    }
    public function okdeliver(Request $request){        
        if($request->ajax()){
            $OrderID=$request->input('OrderID');
            $order = Orders::where('OrderID', $OrderID)->first();
            $order->update(['Delivered' => 1]);
            return response()->json();
        }else{
            return redirect()->route('home.route');
        }
    }
    public function accept(){
        $orders = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }, 'customer'])->where('Status', 0)->where('Delivered', 0)->get();   
        return view("admin.accept", compact("orders"));     
    }
    public function shipping(){
        $orders = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }, 'customer'])->where('Status', 1)->where('Delivered', 0)->get();   
        return view("admin.shipping", compact("orders"));     
    }
    public function delivered(){
        $orders = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }, 'customer'])->where('Delivered', 1)->get();   
        return view("admin.delivered", compact("orders"));     
    }    
    public function admin(){
        $accept = Orders::where('Status', 0)->where('Delivered', 0)->count();   
        $shipping = Orders::where('Status', 1)->where('Delivered', 0)->count();   
        $delivered = Orders::where('Delivered', 1)->get();  
        $revenue= 0;
        foreach($delivered as $item){
            $revenue+=$item->Price;
        }
        $delivered=$delivered->count();
        $numP=Product::where("Type", 1)->count();
        $numL=Product::where("Type", 0)->count();
        return view('admin.index', compact("accept", "shipping", "delivered", "revenue", "numP", "numL"));
    }
}
