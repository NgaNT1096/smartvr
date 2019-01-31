<?php

namespace App\Http\Controllers\Package;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Package\Content;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{

    public function api_Content(){
        $contents = Content::all();
        foreach($contents as $content){
            $content->view_content = [
                'href' => 'api/content/' .$content->id,
                'method' => 'GET'
            ];
        }
        
        $response = [
            'message' => 'List of all content',
            'content' => $contents
        ];

        return response()->json($response, 200);
    }
    public function getLinkContent(){
        return view('admin/Content/addContent');
    }
    public function addNewContent(Request $request){

              $validator = Validator::make($request->all(), [
               'title' => 'required|string|max:255|unique:contents',
               'description' => 'required|string|max:255',
               'type_data' => 'required',
               'price' =>'required',
               'link' =>'required|max:102400'
             ]);
    
    
             if ($validator->fails()) {
                   return redirect('admin/content/them')->withErrors($validator);   
             }else {
    
                // neu chon loai product
              
                  //neu file duoc upload
               if ($request->file('link')->isValid()) {
                  //file  co thuc bat dau doi ten va move
                  $fileExtension = $request->file('link')->getClientOriginalExtension(); // Lấy . của file
                  $fileName = $request->file('link')->getClientOriginalName('link');
                  $fileSize = $request->file('link')->getSize();
                  $mine = $request->file('link')->getMimeType();

                  $uploadPath = public_path('upload/img/'); // Thư mục upload
                
                // Bắt đầu chuyển file vào thư mục
                  $request->file('link')->move($uploadPath, $fileName);

                  $content = new Content;
                  $content->title = $request->input('title');
                  $content->description = $request->input('description');
                  $content->type_data = $request->input('type_data');
                  $content->link = 'upload/img/' .$fileName ;
                  $content->price = $request->input('price');
    
                 
                  $content->save();
                  return redirect('admin/content/them')->with('thongbao','them thanh cong');
              }
             }
    
    }
    public function downloadContent(){
        $downloads = Content::all();
        return view('admin/Content/viewDownload',compact('downloads'));
    }


}
