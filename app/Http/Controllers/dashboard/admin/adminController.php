<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Models\admin;
use App\Models\admin_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check_permission=Gate::forUser(Auth::guard('admin')->user())->allows('view_user');
        $data=admin::with("permission")->get();
        if($check_permission){
            return view('dashboard.admin.view',compact('data'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('dashboard.admin.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $admin=$request->except(["prive","permission"]);
            $admin_user=admin::create($admin);
            $admin_id=$admin_user["id"];

            $admin_type=$request->only(["prive","permission"]);
            admin_type::data_insert($admin_id,$admin_type);
            DB::commit();
            return redirect()->route('admin.index');
        }catch(EXCEPTION $e){
            DB::rollback();
        }

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $admin=admin::where('id', $id)->with("permission")->get()[0];
      return view('dashboard.admin.edite',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin=$request->except("prive","permission","_token","_method");
        admin::where("id",$id)->update($admin);

        admin_type::data_update($request,$id);
        return redirect()->route('admin.index')->with("ms_admin","success update admin");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
