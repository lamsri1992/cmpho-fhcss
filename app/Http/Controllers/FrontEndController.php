<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontEndController extends Controller
{
    public function role()
    {
        $data = DB::table('role_page')->where('role_id',1)->first();
        return view('front.role',['data'=>$data]);
    }

    public function service()
    {
        return view('front.service');
    }

    public function forensics()
    {
        return view('front.forensics');
    }

    public function servicePoint()
    {
        $data = DB::table('role_page')->where('role_id',2)->first();
        return view('front.servicepoint',['data'=>$data]);
    }

    public function manual()
    {
        return view('front.manual');
    }

    public function news()
    {
        $data = DB::table('tb_news')->where('news_status',1)->orderBy('news_id','DESC')->get();
        return view('front.news',['data'=>$data]);
    }
    
    public function newsView($id)
    {
        $data = DB::table('tb_news')->where('news_id',$id)->first();
        return view('front.news_view',['data'=>$data]);
    }

    public function events()
    {
        $data = DB::table('tb_events')->where('events_status',1)->orderBy('events_id','DESC')->get();
        return view('front.events',['data'=>$data]);
    }

    public function eventsView($id)
    {
        $data = DB::table('tb_events')->where('events_id',$id)->first();
        return view('front.events_view',['data'=>$data]);
    }
}
