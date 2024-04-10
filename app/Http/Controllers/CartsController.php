<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;

class CartsController extends Controller
{
    public function __construct()
    {
    }
    public function index(){
        $carts= Cart::with(['products'=>function($query){
            $query->select('ProductID', 'Name', 'Image', 'Price');
        }, 'colors', 'versions'])->where('UserID', app('userID'))->get();
        return view("carts.index", compact("carts"));
    }    
    public function payment(Request $request){
        
        $CartIDs = $request->input('checkbox');
        $carts= Cart::with(['products'=>function($query){
            $query->select('ProductID', 'Name', 'Image', 'Price');
        }])->whereIn('CartID', $CartIDs)->get();
        return view("carts.payment", compact("carts"));
    }

    public function paydone(Request $request){
        session()->flash('success', '1');
        $CartIDs = $request->input('CartsID');
        $name = $request->input('name');
        $contact = $request->input('contact');
        $email = $request->input('gmail');
        $address = $request->input('address');

        $customer= new Customer();
        $customer->Name=$name;
        $customer->Contact=$contact;
        $customer->Email=$email;
        $customer->Address=$address;
        $customer->save();
        $customerID = DB::getPdo()->lastInsertId();

        $order=new Orders;
        $order->Quantity = $request->input('sumquantity');
        $order->Price = $request->input('sumprice');
        $order->Status=0;
        $order->Delivered=0;
        $order->CustomerID=$customerID;
        $order->UserID=app('userID');
        $order->save();
        $orderID = DB::getPdo()->lastInsertId();

        $Carts=Cart::whereIn('CartID', $CartIDs)->get();
        foreach($Carts as $item){
            $detail=new OrderDetail;
            $detail->Quantity=$item->Quantity;
            $detail->ProductID=$item->ProductID;
            $detail->VersionID=$item->VersionID;
            $detail->ColorID=$item->ColorID;
            $detail->OrderID=$orderID;
            $detail->save();
        }
        $Carts=Cart::whereIn('CartID', $CartIDs)->delete();

        $order = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }, 'customer'])->where('OrderID', $orderID)->first();   
        Mail::send('emails.bill', compact('order'), function($mail) use($email, $name){
            $mail->subject('Hóa đơn từ CellphoneS');
            $mail->to($email, $name);
        });

        return redirect()->route('cart.route');
    }

}