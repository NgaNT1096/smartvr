<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\Oculus;
use Illuminate\Support\Facades\Validator;
class OculusController extends Controller
{
    public function index(){
        $oculuss = Oculus::all();
        return view('admin/Oculus/ListOculus',compact('oculuss'));
    }
    public function getOculus(){
        return view('admin/Oculus/AddOculus');
    }
    public function addNewOculus(Request $request){

              $validator = Validator::make($request->all(), [
               'name' => 'required|string|max:255|unique:oculuses',
               'description' => 'required|string|max:255'
             ]);
    
    
             if ($validator->fails()) {
                   return redirect('admin/oculus/them')->withErrors($validator);   
             }else {

                  $oculus = new Oculus;
                  $oculus->name = $request->input('name');
                  $oculus->status = "chua thue";
                  $oculus->description = $request->input('description');
    
                  $oculus->save();
                  return redirect('admin/oculus/them')->with('thongbao','them thanh cong');
                }
    
    }
}
