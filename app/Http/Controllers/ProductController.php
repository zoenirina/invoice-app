<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, Product $product){
         return $product::all();//tout
        //return $product::where('id',$request->id)->get();
      /*  return response([
            'message'=> 'row added sucessfully',
            'status'=> 'success'
        ]);*/
    }
    public function store(Request $request, Product $product){
        if ($this->validationReq($request)->fails() == false) {
            return response([
                'message'=> 'row added sucessfully',
                'status'=> 'success'
            ]);
        }else {
            return response([
                'message'=> 'an eeror occured',
                'status'=> 'error'
            ]);
        }
    }
    PUBLIC function update(Request $request, Product $product){
        
        if($this->validationid($request)->fails()== false){
        $row=$product::find($request->item_code);
            $row->item_code=$request->item_code; //si les champs sont vides.
            $row->description=$request->description;
            $row->unit_price=$request->unit_price;
            $row->save();
            return response([
                'message'=> 'row updated sucessfully',
                'status'=> 'success'
            ]);
        }else{
            return response([
                'message'=> 'error durring update! please, check that item-code exists',
                'status'=> 'erroe'
            ]);
        }
            }
    private function validationReq(Request $request){
return Validator::make(
    $request->all(),[
        'item_code'=>'required',
        'description'=>'required',
        'unit_price'=>'required',
    ]
);
    }
    private function validationid(Request $request){
        return Validator::make(
            $request->all(),[
                'item_code'=>'required',
            ]
        );
            }
}
