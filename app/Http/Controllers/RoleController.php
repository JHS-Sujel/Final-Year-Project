<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];

        $roles = Role::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/roles", 'name' => "Roles"]
        ];

        return view('/roles/index', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'roles' => $roles,
            'link' => route('roles.create'),
            'link_icon' => 'feather icon-plus-circle'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/roles", 'name' => "Roles"],
            ['link' => "", 'name' => "Create A New Role"],
        ];

        return view('/roles/create', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'link' => route('roles.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => 1
        ]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Role info stored successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $pageConfigs = [
            'sidebarCollapsed' => true
        ];


        $breadcrumbs = [
            ['link' => "/admin", 'name' => "Home"],
            ['link' => "/admin/roles", 'name' => "Roles"],
            ['link' => "", 'name' => "Update Role"],
        ];

        return view('/roles/edit', [
            'pageConfigs' => $pageConfigs,
            'breadcrumbs' => $breadcrumbs,
            'role' => $role,
            'link' => route('roles.index'),
            'link_icon' => 'feather icon-arrow-left-circle'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required|unique:roles,id,$role->id|max:255",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Role info updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
