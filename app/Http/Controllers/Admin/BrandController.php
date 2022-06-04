<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Exception;
use App\Http\Requests\StoreBrandFormRequest;

class BrandController extends Controller
{
    public function index()
	{
	    $brands = Brands::orderBy('id','desc')->paginate(5);
	   
	    return view('admin.pages.brands.index', compact('brands'));
	}

	public function create()
	{	    
	    return view('admin.pages.brands.create');
	}

	public function store(StoreBrandFormRequest $request)
    {

     try{

    	$input = $request->all();

    	$brand = new Brands;
       
    	$brand->name = $input['name'];
		$brand->description = $input['description'];

		if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/brand'), $filename);           
            $brand->image = $filename;
        }
			
		$brand->save();      
        
        return redirect()->route('admin.brands.index')->with('success','Brand has been created successfully.');

        }catch(Exception $e){
         	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
       }
        

    }

    public function edit(Request $request,$id)
	{
		try{
		    $brand = Brands::where('id',$id)->first();  
				   
		    return view('admin.pages.brands.edit', compact('brand'));

	     }catch(Exception $e){
	     	return response()->json([
         		"success" => false,
         		"errors" => $e->getMessage()
         	]);
	     }
	}

	public function update(StoreBrandFormRequest $request)
	{
	    
	    $input = $request->all();

	    $brand = Brands::find($input['id']);
	    $brand->name = $input['name'];
		$brand->description = $input['description'];	

	    if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/brand'), $filename);           
            $brand->image = $filename;
        }

		$brand->save();  
	

     return redirect()->route('admin.brands.index')
		->with('success','Brands has been updated successfully');
	   
	}

	public function destroy(Request $request,$id)
	{
		
		 // delete
        $brand = Brands::find($id);
        $brand->delete();

		return redirect()->route('admin.brands.index')
		->with('success','Brand has been deleted successfully');
	}
}
