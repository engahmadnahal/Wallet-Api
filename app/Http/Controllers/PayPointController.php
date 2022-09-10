<?php

namespace App\Http\Controllers;

use App\Models\Compony;
use App\Models\PayPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Str;
class PayPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pays = PayPoint::all();
        return view('paypoint.index',[
            'pays' => $pays
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $compony = Compony::all();
        $roles = Role::where('guard_name','point')->get();
        return view('paypoint.create',[
            'compony' => $compony,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(),[
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|string',
            'compony_id' => 'required|exists:componies,id',
            'role_id' => 'required|exists:roles,id',
            
        ]);

        if(!$validator->fails()){

            $payPoint = new PayPoint;
            $payPoint->name_en = $request->input('name_en');
            $payPoint->name_ar = $request->input('name_ar');
            $payPoint->mobile = $request->input('mobile');
            $payPoint->email = $request->input('email');
            $payPoint->compony_id = $request->input('compony_id');
            $password = Str::random(6);
            $payPoint->password = Hash::make($password);
            $payPoint->save();

            // givRole
            $payPoint->syncRoles(Role::findOrFail($request->input('role_id')));


            return response()->json([
                'title'=> __('msg.success'),
                'message' => __('msg.success_create')
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'title'=> __('msg.error'),
                'message' => $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayPoint  $payPoint
     * @return \Illuminate\Http\Response
     */
    public function show(PayPoint $payPoint)
    {
        //
        return view('paypoint.show',[
            'payPoint' => $payPoint,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayPoint  $payPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(PayPoint $payPoint)
    {
        //
        $compony = Compony::all();
        $roles = Role::where('guard_name','point')->get();
        return view('paypoint.edit',[
            'payPoint' => $payPoint,
            'compony' => $compony,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayPoint  $payPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayPoint $payPoint)
    {
        //
        $validator = Validator($request->all(),[
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'required|string',
            'compony_id' => 'required|exists:componies,id',
            'role_id' => 'required|exists:roles,id',

        ]);

        if(!$validator->fails()){

            $payPoint->name_en = $request->input('name_en');
            $payPoint->name_ar = $request->input('name_ar');
            $payPoint->mobile = $request->input('mobile');
            $payPoint->email = $request->input('email');
            $payPoint->compony_id = $request->input('compony_id');
            $payPoint->save();

            $payPoint->syncRoles(Role::findOrFail($request->input('role_id')));
            return response()->json([
                'title'=> __('msg.success'),
                'message' => __('msg.success_edit')
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'title'=> __('msg.error'),
                'message' => $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayPoint  $payPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayPoint $payPoint)
    {
        //
        $isDelete = $payPoint->delete();
        return response()->json([
            'title' => $isDelete ? __('msg.success') : __('msg.error'),
            'message' =>$isDelete ? __('msg.success_delete') : __('msg.error_delete')
        ],$isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }


    public function changeStatus(PayPoint $payPoint){
        if($payPoint->status == 'active'){
            $payPoint->status = 'block';
        }else{
            $payPoint->status = 'active';
        }
        $isSave = $payPoint->save();

        return response()->json([
            'title' => $isSave ? __('msg.success') : __('msg.error'),
            'message' =>$isSave ? __('msg.success_action') : __('msg.error_action')
        ],$isSave ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}