<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\StoreProductFormRequest;
use App\Models\Category;
use Exception;
use App\Models\ProductImages;
use App\Models\Brands;
use App\Models\ProductCategories;
use DB;
use Storage;
class ProductController extends Controller
{
    public function index()
	{
	    $products = Products::with('categories','brand')->orderBy('id','desc')->paginate(5);
	   
	    return view('admin.pages.products.index', compact('products'));
	}

	public function create()
	{
	   
	    $categories = Category::select('id','name')->get();
	    $brands =  Brands::select('id','name')->get();
	    
	    return view('admin.pages.products.create', compact('categories','brands'));
	}

	public function store(StoreProductFormRequest $request)
    {

    	DB::beginTransaction();
    	try{

    	$input = $request->all();

    	$product = new Products;
        $product->brand_id = $input['brand_id'];
        $product->sku = $input['sku'];
    	$product->name = $input['name'];
		$product->description = $input['description'];
		$product->stock = $input['stock'];	
		$product->price = $input['price'];
		$product->sale_price = $input['sale_price'];
		$product->status = isset($input['status']) ? 1 : 0;
		$product->featured = isset($input['featured']) ? 1 : 0;	

	   if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);           
            $product->image = $filename;
        }    

		$product->save();
        
        // $product = Products::insert([			 
			     //     'sku' => $input['sku'],
			     //     'name' => $input['name'],			         
			     //     'description' => $input['description'] ,
			     //     'quantity' => $input['quantity'],
			     //     'weight' => $input['weight'],
			     //     'price' => $input['price'],
			     //     'sale_price' => $input['sale_price'],
			     //     'status' => $input['status'],
			     //     'featured' => $input['featured'],
			     //     'link'  => $input['link']
        //  ]);

          $product_id = $product->id;
          $categories = $input['categories'];
          if(count($categories) > 0){
          	foreach ($categories as $key => $category_id) {
          		ProductCategories::create([
					 "category_id" => $category_id,
					 "product_id" => $product_id
                 ]);
          	}
          }

      if($request->file('images')){
        foreach($request->file('images') as $imagefile) {
				     $db_image = new ProductImages;
				     $path = $imagefile->store('/images/product', ['disk' =>   'product_galley_files']);
				     $db_image->image = $path;
				     $db_image->product_id = $product_id;
				     $db_image->save();
         }
     }

          DB::commit();
     //     ProductImages::inser([
     //     ]);

         return redirect()->route('admin.products.index')->with('success','Product has been created successfully.');

        }catch(Exception $e){
        	 DB::rollback();
         	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
         }
        
    }

    public function edit(Request $request,$id)
	{
		try{
		    $product = Products::where('id',$id)->first();	   
		    $categories = Category::select('id','name')->get();
		    $brands =  Brands::select('id','name')->get();
		   
		    return view('admin.pages.products.edit', compact('categories', 'product','brands'));

	     }catch(Exception $e){
	     	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
	     }
	}

	public function update(StoreProductFormRequest $request)
	{
	   	    

    DB::beginTransaction();
    	try{

    	$input = $request->all();
    	$product = Products::find($input['product_id']);
        $product->brand_id = $input['brand_id'];
        $product->sku = $input['sku'];
    	$product->name = $input['name'];
		$product->description = $input['description'];
		$product->stock = $input['stock'];
		$product->price = $input['price'];
		$product->sale_price = $input['sale_price'];
		$product->status = isset($input['status']) ? 1 : 0;
		$product->featured = isset($input['featured']) ? 1 : 0;	

	   if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);           
            $product->image = $filename;
        }

		$product->save();
        
        // $product = Products::insert([			 
			     //     'sku' => $input['sku'],
			     //     'name' => $input['name'],			         
			     //     'description' => $input['description'] ,
			     //     'quantity' => $input['quantity'],
			     //     'weight' => $input['weight'],
			     //     'price' => $input['price'],
			     //     'sale_price' => $input['sale_price'],
			     //     'status' => $input['status'],
			     //     'featured' => $input['featured'],
			     //     'link'  => $input['link']
        //  ]);

          $product_id = $product->id;
          $categories = $input['categories'];
          if(count($categories) > 0){
          	foreach ($categories as $key => $category_id) {
          		ProductCategories::create([
					 "category_id" => $category_id,
					 "product_id" => $product_id
                 ]);
          	}
          }

          DB::commit();
     //     ProductImages::inser([
     //     ]);

         return redirect()->route('admin.products.index')->with('success','Product has been updated successfully.');

        }catch(Exception $e){
        	 DB::rollback();
         	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
         }
	 


	}

	public function destroy(Request $request,$id)
	{
		
		 // delete
        $products = Products::find($id);
        $products->delete();

		return redirect()->route('admin.products.index')
		->with('success','Product has been deleted successfully');
	}
	
}
