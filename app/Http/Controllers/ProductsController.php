<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Laptop;
use App\Models\Orders;
use App\Models\Phone;
use App\Models\Version;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct()
    {
    }
    public function home(){
        
        $products = Product::take(8)->where("Status", 1)->get();
        $products1 = Product::take(8)->where("Type", 1)->get();
        $products0 = Product::take(8)->where("Type", 0)->get();
        $brands1 = Brand::take(4)->where("Type", 1)->get();
        $brands0 = Brand::take(4)->where("Type", 0)->get();
        return view("index", compact("products", "products1", "products0", "brands1", "brands0"));
    }        
    public function phone(){
        $name='Tất cả Điện thoại';
        $products = Product::where('Type', 1)->get();
        $brands = Brand::where('Type', 1)->get();
        return view("products.index", compact("products", "brands", "name"));
    }
    public function laptop(){
        $name='Tất cả Laptop';
        $products = Product::where('Type', 0)->get();
        $brands = Brand::where('Type', 0)->get();
        return view("products.index", compact("products", "brands", "name"));
    }
    public function show($id){
        $products = Product::all();
        $comments = Comment::with(['user'=>function($query){
            $query->select('id', 'name');
        }])->where('ProductID', $id)->get();

        $product=Product::where('ProductID', $id)->first();
        $type = ($product->Type == 1) ? 'phone' : 'laptop';
        $product = Product::with($type, 'colors', 'versions', 'images')->where('ProductID', $id)->first();

        
        return view("products.show", compact("product", "products", "comments"));
    }
    public function addCart(Request $request){
        if($request->ajax()){
            $newCart= new Cart;
            $newCart->ProductID = $request->input('ProductId');
            $newCart->ColorID = $request->input('ColorID');
            $newCart->VersionID = $request->input('VersionID');
            $newCart->UserID = app('userID');
            $newCart->Quantity = 1;
            $newCart->save();
            $numcart = $request->input('Numcart')+1;
            return response()->json(['numcart' => $numcart]);
        }else{
            return redirect()->route('home.route');
        }
    }
    public function comment(Request $request){
        if($request->ajax()){
            $newcomment= new Comment;
            $newcomment->ProductID = $request->input('ProductId');
            $newcomment->Comment = $request->input('Comment');
            $newcomment->UserID = app('userID');
            $newcomment->save();
            $id=DB::getPdo()->lastInsertId();
            $comment = Comment::with(['user'=>function($query){
                $query->select('id', 'name');
            }])->where('CommentID', $id)->first();
            return response()->json(['newcomment' => $comment]);
        }else{
            return redirect()->route('home.route');
        }
    }
    public function removeCart(Request $request){
        if($request->ajax()){
            Cart::where('CartID', $request->input('CartId'))->delete();    
            $numcart = $request->input('Numcart')-1;
            return response()->json(['numcart' => $numcart]);        
        }else{
            return redirect()->route('home.route');
        }
    }
    public function addQuantity(Request $request){
        if($request->ajax()){
            $id=$request->input('CartID');
            $qt=$request->input('Quantity');
            $test=$request->input('CartID');
            $update = Cart::where('CartID', $id)->first();
            
            $update->update(['Quantity' => $qt]);

            return response()->json(['numcart' => $test]);
        }else{
            return redirect()->route('home.route');
        }
    }
    public function search($value){
        $name='TÌm kiếm : "'.$value.'"';
        $products = Product::where('Name', 'like', '%' . $value . '%')
                //    ->orWhere('description', 'like', '%' . $value . '%')
                   ->get();
        
        return view('products.search', compact("products", "name"));
    }    
    public function adminsearch($value){
        $name='TÌm kiếm : "'.$value.'"';
        $products = Product::where('Name', 'like', '%' . $value . '%')
                //    ->orWhere('description', 'like', '%' . $value . '%')
                   ->get();
        
        return view('admin.search', compact("products", "name"));
    }    
    public function editproductshow($id){        
        $product=Product::where('ProductID', $id)->first();
        $type = ($product->Type == 1) ? 'phone' : 'laptop';
        $brands=Brand::where("Type", $type)->get();
        $product = Product::with($type, 'colors', 'versions', 'images')->where('ProductID', $id)->first();
        return view("admin.editproduct", compact("product", "brands"));
    }
    public function editproduct(Request $request){
        $productID=$request->input("productid");
        $product=Product::where("ProductID", $productID)->first();
        $product->update(["Name"=>$request->input("name")]);
        $product->update(["Status"=>$request->input("status")]);
        $product->update(["Price"=>$request->input("price")]);
        $product->update(["Quantity"=>$request->input("quantity")]);
        $product->update(["Warranty"=>$request->input("warranty")]);
        $product->update(["Descripsion"=>$request->input("description")]);
        $product->update(["Detail"=>$request->input("detail")]);
        $product->update(["BrandID"=>$request->input("brand")]);
        if($product->Type==1){
            $phone=Phone::where("ProductID", $productID)->first();
            $phone->update(["Screen"=>$request->input("screen")]);
            $phone->update(["Camerabf"=>$request->input("camerabf")]);
            $phone->update(["Cameraat"=>$request->input("cameraat")]);
            $phone->update(["Cpu"=>$request->input("cpu")]);
            $phone->update(["Ram"=>$request->input("ram")]);
            $phone->update(["Ssd"=>$request->input("ssd")]);            
            $phone->update(["Pin"=>$request->input("pin")]);
            $phone->update(["Os"=>$request->input("os")]);
            $phone->update(["Material"=>$request->input("material")]);
            $phone->update(["Weight"=>$request->input("weight")]);
        }else{
            $laptop=Laptop::where("ProductID", $productID)->first();
            $laptop->update(["Cpu"=>$request->input("cpu")]);
            $laptop->update(["Gpu"=>$request->input("gpu")]);
            $laptop->update(["Ram"=>$request->input("ram")]);
            $laptop->update(["Ssd"=>$request->input("ssd")]);
            $laptop->update(["Screen"=>$request->input("screen")]);
            $laptop->update(["Pin"=>$request->input("pin")]);
            $laptop->update(["Os"=>$request->input("os")]);
            $laptop->update(["Material"=>$request->input("material")]);
            $laptop->update(["Weight"=>$request->input("weight")]);
        }
        return redirect('product/'.$productID);
    }
    public function addlaptopshow(){
        $brands=Brand::where("Type", 0)->get();
        return view("admin.addlaptop", compact("brands"));
    }
    public function addphoneshow(){
        $brands=Brand::where("Type", 1)->get();
        return view("admin.addphone", compact("brands"));
    }
    public function addphone(Request $request){
        $product=new Product();        
        $product->Name=$request->input('name');
        $product->Status=$request->input('status');
            $namefile=$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/phones/upload/', $namefile);
        $product->Image = 'images/phones/upload/'.$namefile;        
        $product->Price=$request->input('price');
        $product->Warranty=$request->input('warranty');
        $product->Quantity=$request->input('quantity');                        
            $descrip1=$request->input('descrip1');
            $descrip2=$request->input('descrip2');
            $descrip3=$request->input('descrip3');
            $descrip4=$request->input('descrip4');
            $descrip5=$request->input('descrip5');
        $product->Description=$descrip1."..".$descrip2."..".$descrip3."..".$descrip4."..".$descrip5;
        $product->Type=1;
        $product->Detail=$request->input('detail');
        $product->BrandID=$request->input('brand');
        $product->save();
        $productID = DB::getPdo()->lastInsertId();
        
        $specific= new Phone();        
        $specific->Screen=$request->input('screen');
        $specific->Cameraat=$request->input('cameraaf');
        $specific->Camerabf=$request->input('camerabf');
        $specific->Cpu=$request->input('cpu');
        $specific->Ram=$request->input('ram');
        $specific->Ssd=$request->input('ssd');
        $specific->Pin=$request->input('pin');
        $specific->Os=$request->input('os');
        $specific->Material=$request->input('material');
        $specific->Weight=$request->input('weight');
        $specific->ProductID=$productID;
        $specific->save();

        $versionC=$request->input('versioncount');        
        for ($i = 1; $i <$versionC ; $i++){
            $version=new Version();        
            $version->Version=$request->input('version'.$i);
            $version->ProductID=$productID;
            $version->save();
        }

        $colorC=$request->input('colorcount');          
        for ($i = 1; $i <$colorC ; $i++){
            $color=new Color();      
            $color->Color=$request->input('color'.$i);
            $color->ProductID=$productID;
            $color->save();
        }
        return redirect('product/'.$productID);
    }
    public function addlaptop(Request $request){
        $product=new Product();        
        $product->Name=$request->input('name');
        $product->Status=$request->input('status');
            $namefile=$request->file('image')->getClientOriginalName();
            $request->file('image')->move('images/laptops/upload/', $namefile);
        $product->Image = 'images/laptops/upload/'.$namefile;        
        $product->Price=$request->input('price');
        $product->Warranty=$request->input('warranty');
        $product->Quantity=$request->input('quantity');                        
            $descrip1=$request->input('descrip1');
            $descrip2=$request->input('descrip2');
            $descrip3=$request->input('descrip3');
            $descrip4=$request->input('descrip4');
            $descrip5=$request->input('descrip5');
        $product->Description=$descrip1."..".$descrip2."..".$descrip3."..".$descrip4."..".$descrip5;
        $product->Type=0;
        $product->Detail=$request->input('detail');
        $product->BrandID=$request->input('brand');
        $product->save();
        $productID = DB::getPdo()->lastInsertId();
        
        $specific= new Laptop();        
        $specific->Cpu=$request->input('cpu');
        $specific->Gpu=$request->input('Gpu');
        $specific->Ram=$request->input('ram');
        $specific->Ssd=$request->input('ssd');
        $specific->Screen=$request->input('screen');
        $specific->Pin=$request->input('pin');
        $specific->Os=$request->input('os');
        $specific->Material=$request->input('material');
        $specific->Weight=$request->input('weight');
        $specific->ProductID=$productID;
        $specific->save();

        $versionC=$request->input('versioncount');        
        for ($i = 1; $i <$versionC ; $i++){
            $version=new Version();        
            $version->Version=$request->input('version'.$i);
            $version->ProductID=$productID;
            $version->save();
        }

        $colorC=$request->input('colorcount');          
        for ($i = 1; $i <$colorC ; $i++){
            $color=new Color();      
            $color->Color=$request->input('color'.$i);
            $color->ProductID=$productID;
            $color->save();
        }
        return redirect('product/'.$productID);
    }
    public function deleteproduct($id){
        Product::where('ProductID', $id)->delete();
        return redirect('admin');
    }
    public function bill(){
        $order = Orders::with(['orderDetails.product'=>function($query){
            $query->select('ProductID', 'Name', 'Price', 'Image');
            }, 
            'orderDetails.version'=>function($query){
                $query->select('VersionID', 'Version');
            }, 
            'orderDetails.color'=>function($query){
                $query->select('ColorID', 'Color');
        }, 'customer'])->where('OrderID', 4)->first(); 
        return view('emails.bill', compact("order"));
    }
}
