<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Children;
use App\Models\Classe;
use App\Models\Father;
use App\Models\Game;
use App\Models\History;
use App\Models\Level;
use App\Models\Plan;
use App\Models\Semester;
use App\Models\Subscription;
use App\Models\Teacher;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        return view('index');
    }

    

    public function setLocal(Request $request){

        $validator = Validator($request->all(),[
            'keylang' => 'required|string|in:en,ar'
        ]);
        if(!$validator->fails()){
            session()->put('lang', $request->input('keylang'));
            return response()->json(['message'=>'تم تغير اللغة بنجاح'],Response::HTTP_OK);
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function showNotification(){

        return view('admin.notification');
    }

    public function readNotification(){
        auth()->user()->unreadNotifications->markAsRead();
    }
}
