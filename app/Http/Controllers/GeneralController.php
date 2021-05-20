<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function page($slug)
    {
        $pageContent = StaticPage::where('slug', $slug)->first();
        if($pageContent){
            return view('static_page')->with('pageContent',$pageContent);
        }else{
            return abort(404);
        }
    }
}
