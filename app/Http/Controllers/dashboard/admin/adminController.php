<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Models\admin;
use App\Models\admin_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.view');
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
        try{
            $admin=$request->except(["prive","permission"]);
            $admin_user=admin::create($admin);
            $admin_id=$admin_user["id"];

            $admin_type=$request->only(["prive","permission"]);

            admin_type::data_insert($admin_id,$admin_type);
            return redirect()->route('admin.index');
        }catch(EXCEPTION $e){
            return abort(401);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
