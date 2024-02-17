<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function show(Request $request, Customer $customer){
        return $customer::all(); //recuperer tous
        // return $customer::where('firstname','vivi')->get();
        //return $customer::where('firstname',$request->firstname)->get();//avec précision
        // return $customer::where('firstname',$request->firstname)
        // ->whereOr('lastname',$request->lastname)
       
        // ->get(['fistname','lastname']);//une seule colonne
 //->get();//recuperer toutes les colonnes
       // ->get('fistname');//une seule colonne

        //recuperation d'un identifiant
       // return $customer::where('id',$request->id)->get(); //ou stocker avantet réutiliser plus tars
        // return $customer::find($request->id);

    }

    public function store(Request $request,Customer $customer){
       
        $data = $this->validateReq($request);
        if($data->fails() == false){
            $customer->lastname=$request->lastname??''; //si les champs sont vides.
            $customer->firstname=$request->firstname??'';
            $customer->email=$request->email??'';
            $customer->address=$request->address??'';
            $customer->save();
        return response([
            'message'=> 'row added sucessfully',
            'status'=> 'success'
        ]
        );
    }else{
            return response([
                'message'=> ' addingerror in',
                'status'=> 'error'
            ]);
       
        };
        
    }

    public function update(Request $request,Customer $customer){     
        $data = $this->updateValidate($request);
        
        switch ($data->fails()) {
            case false:
               $row=$customer::find($request->id);

                $row->lastname=$request->lastname; //si les champs sont vides.
                $row->firstname=$request->firstname;
                $row->email=$request->email;
                $row->address=$request->address;

            $row->save();
                    return response([
                        'message'=> 'row added sucessfully',
                        'status'=> 'success'
                    ]);
                break;
            
            case true:


                return response([
                    'message'=> ' addingerror in',
                    'status'=> 'error'
                ]);
                break;
        }

        
        
    }
    //validation de la requete si null
    private function validateReq(Request $request){
        return Validator::make(
            $request->all(),[
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'email',
                'address'=>'required',
            ]
        );
    }

    private function updateValidate(Request $request){
        return Validator::make(
            $request->all(),[
                'id'=>'required',
            ]
        );
    }
    public function delete(Request $request,Customer $customer){  
        $row=$customer::find($request->id);
        $row->delete();
        return response([
            'message'=> ' row deleted successfully',
            'status'=> 'error'
        ]);
    }
}


