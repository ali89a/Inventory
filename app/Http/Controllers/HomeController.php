<?php

namespace App\Http\Controllers;
use App;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.dashboard');
    }
     protected function path(string $suffix){
        return "admin.access_control.permission.{$suffix}";
    }
    public function a()
    {
       $data = [
    'permissions' => Permission::all(),
];

return view($this->path('index'), $data);

    }
}
