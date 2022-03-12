<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // User Profile
     public function show(){
        $pageConfigs = [
          'sidebarCollapsed' => true
      ];

      $breadcrumbs = [
          ['link'=>"/admin",'name'=>"Home"], ['link'=>"/admin",'name'=>"Pages"], ['name'=>"Profile"]
      ];

      return view('/pages/profile', [
          'pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs
      ]);
    }


    public function logout() {
      $result = Auth::logout();
      return response()->json($result);
    }
}
