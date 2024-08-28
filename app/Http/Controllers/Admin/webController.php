<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;

class webController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function news()
    {
        $data = DB::table('tb_news')
                ->leftJoin('tb_status','status_id','news_status')
                ->get();
        return view('admin.news',['data'=>$data]);
    }

    public function newsCreate(Request $request)
    {
        $date = date('Y-m-d');
        $validatedData = $request->validate(
            [
                'news_title' => 'required',
                'news_text' => 'required',
                'news_files' => 'required',

            ],
            [
                'news_title.required' => 'กรุณาระบุหัวข้อข่าว',
                'news_text.required' => 'กรุณาระบุเนื้อหาข่าว',
                'news_files.required' => 'กรุณาแนบไฟล์',
            ],
        );

        // Upload Files
        $file  = $request->file('news_files');
        $originalName = $file->getClientOriginalName();
        $fileName = date('Ymdhis')."_".$file->getClientOriginalName();
        $destination = public_path('files/news/');

        File::makeDirectory($destination, 0755, true, true);
        $file->move(public_path('files/news/'), $fileName);

        // Insert To Database
        DB::table('tb_news')->insert([
            'news_title' => $request->news_title,
            'news_text' => $request->news_text,
            'news_files' => $fileName,
            'news_date' => $date,
        ]);

        return back()->with('success','เพิ่มข่าวประชาสัมพันธ์แล้ว - '.$request->news_title);
    }

    public function newsShow($id)
    {
        $data = DB::table('tb_news')
                ->leftJoin('tb_status','status_id','news_status')
                ->where('news_id',$id)
                ->first();
        $stat = DB::table('tb_status')->get();
        return view('admin.show_news',['data'=>$data,'stat'=>$stat]);
    }    

    public function newsUpdate(Request $request,$id)
    {
        $validatedData = $request->validate(
            [
                'news_title' => 'required',
                'news_text' => 'required',

            ],
            [
                'news_title.required' => 'กรุณาระบุหัวข้อข่าว',
                'news_text.required' => 'กรุณาระบุเนื้อหาข่าว',
            ],
        );
        
        $file  = $request->file('news_files');
        if(!isset($file))
        {
            DB::table('tb_news')->where('news_id',$id)->update([
               'news_title' => $request->news_title,
               'news_text' => $request->news_text,
               'news_status' => $request->news_status,
           ]);
        }else{
            // Upload Files
            $file  = $request->file('news_files');
            $originalName = $file->getClientOriginalName();
            $fileName = date('Ymdhis')."_".$file->getClientOriginalName();
            $destination = public_path('files/news/');

            File::makeDirectory($destination, 0755, true, true);
            $file->move(public_path('files/news/'), $fileName);

            // Update
            DB::table('tb_news')->where('news_id',$id)->update([
                'news_title' => $request->news_title,
                'news_text' => $request->news_text,
                'news_status' => $request->news_status,
                'news_files' => $fileName,
            ]);
        }
        return back()->with('success','แก้ไขประชาสัมพันธ์แล้ว - '.$request->news_title);
    }    

    public function events()
    {
        $data = DB::table('tb_events')
                ->leftJoin('tb_status','status_id','events_status')
                ->get();
        return view('admin.events',['data'=>$data]);
    }

    public function eventsCreate(Request $request)
    {
        $date = date('Y-m-d');
        $validatedData = $request->validate(
            [
                'events_title' => 'required',
                'events_text' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg|',
            ],
            [
                'events_title.required' => 'กรุณาระบุหัวข้อกิจกรรม',
                'events_text.required' => 'กรุณาระบุเนื้อหากิจกรรม',
                'events_img.required' => 'กรุณาเพิ่มรูปภาพอย่างน้อย 1 ภาพ',
            ],
        );
        $images = $request->file('events_img');
        $arr = '';
        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            $arr .= $imageName . ',';
            // Upload Image
            $destination = public_path('img/events/');
            File::makeDirectory($destination, 0755, true, true);
            $image->move(public_path('img/events/'), $imageName);
        }
        $arr = rtrim($arr, ',');

        // Insert To Database
        DB::table('tb_events')->insert([
            'events_title' => $request->events_title,
            'events_text' => $request->events_text,
            'events_img' => $arr,
            'events_date' => $date,
        ]);

        return back()->with('success','เพิ่มข่าวกิจกรรมแล้ว - '.$request->events_title);
    }

    public function eventsUpdate(Request $request,$id)
    {
        $date = date('Y-m-d');
        $validatedData = $request->validate(
            [
                'events_title' => 'required',
                'events_text' => 'required',
            ],
            [
                'events_title.required' => 'กรุณาระบุหัวข้อกิจกรรม',
                'events_text.required' => 'กรุณาระบุเนื้อหากิจกรรม',
            ],
        );
        // Update
        DB::table('tb_events')->where('events_id',$id)->update([
            'events_title' => $request->events_title,
            'events_text' => $request->events_text,
            'events_status' => $request->events_status,
        ]);
        return back()->with('success','แก้ไขข่าวกิจกรรมแล้ว - '.$request->events_title);
    }

    public function eventsShow($id)
    {
        $data = DB::table('tb_events')
                ->leftJoin('tb_status','status_id','events_status')
                ->where('events_id',$id)
                ->first();
        $stat = DB::table('tb_status')->get();        
        return view('admin.show_events',['data'=>$data,'stat'=>$stat]);
    }

    public function deleteImage(Request $request,$id)
    {
        $id = $request->id;
        $img = $request->img;
        // Delete Image
        $delete = public_path('img/events/'.$img);
        @unlink($delete);
        // Get Current ID , Image Name
        $data = DB::table('tb_events')->where('events_id',$id)->first();
        // Create Array New Image
        $array = (explode(",",$data->events_img));
        if (in_array($img, $array))
        {
            unset($array[array_search($img,$array)]);
        }
        $new = implode(",", $array);
        // Update New Array
        DB::table('tb_events')->where('events_id',$id)->update([
            "events_img" => $new,
        ]);
        return back()->with('success','ลบรูปภาพแล้ว - '.$img);
    }

    public function addImage(Request $request,$id)
    {
        $event = DB::table('tb_events')->select('events_img')->where('events_id',$id)->first();
        $images = $request->file('events_img');
        $arr = '';
        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            $arr .= $imageName . ',';
            // Upload Image
            $destination = public_path('img/events/');
            File::makeDirectory($destination, 0755, true, true);
            $image->move(public_path('img/events/'), $imageName);
        }
        $arr_select = array();
        foreach($request->file('events_img') as $img){
            $name = $img->getClientOriginalName();
            $arr_select[] = $name;
        }
        $imgs = implode(",", $arr_select);
        $newImg = $event->events_img.",".$imgs;

        DB::table('tb_events')->where('events_id',$id)->update([
            "events_img" => $newImg,
        ]);
        return back()->with('success','เพิ่มรูปภาพกิจกรรมสำเร็จ');
    }

    public function role()
    {
        $data = DB::table('role_page')->where('role_id',1)->first();
        return view('admin.role',['data'=>$data]);
    }

    public function roleUpdate(Request $request)
    {
        DB::table('role_page')->where('role_id',1)->update([
            "role_text" => $request->content,
        ]);
        return back()->with('success','บันทึกข้อมูลแล้ว');
    }

    public function servicepoint()
    {
        $data = DB::table('role_page')->where('role_id',2)->first();
        return view('admin.servicepoint',['data'=>$data]);
    }

    public function servicepointUpdate(Request $request)
    {
        DB::table('role_page')->where('role_id',2)->update([
            "role_text" => $request->content,
        ]);
        return back()->with('success','บันทึกข้อมูลแล้ว');
    }
}
