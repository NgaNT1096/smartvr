<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\Theme;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    public function index(){
        $theme = Theme::all();
        return view('admin/Theme_Content/ListTheme',compact('theme'));
    }
    public function getLinkTheme(){
        return view('admin/Theme_Content/AddNewtheme');
    }
    public function addNewTheme(Request $request){

        $validator = Validator::make($request->all(), [
         'name' => 'required|string|max:255|unique:oculuses'
       ]);


       if ($validator->fails()) {
             return redirect('admin/theme/them')->withErrors($validator);   
       }else {

            $theme = new Theme;
            $theme->name = $request->input('name');
        
            $theme->save();
            return redirect('admin/theme/them')->with('thongbao','them thanh cong');
          }

}
}
