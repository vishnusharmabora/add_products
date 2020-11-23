<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
    }
 
 public function add_product()
    {
        return view('add_product');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);  

$validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_details' => 'required',
            'product_price' => 'required',            
            
        ]); 

       


$name ="";
      if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $name = strtotime(date('Y-m h:i:s')).'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads', $name);
          }

if ($validator->fails()) {
            return redirect('add_product')
            ->withErrors($validator)
            ->withInput();
        }else{

        
            DB::table('products')->insert([
                'product_name' => $request->product_name,
                'product_details' => $request->product_details,
                'product_price' => $request->product_price,
                'product_image' => $name,
                'user_id' => $request->user_id,
            ]);
              return redirect()->route('add_product')->with('success', 'product added');
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
 public function products()
    {
 $products = DB::table('products')->get();       
    return view('index' , compact('products'));
        
   






    }


}
