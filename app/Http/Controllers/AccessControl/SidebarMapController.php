<?php
namespace App\Http\Controllers\AccessControl;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class SidebarMapController extends BaseController{

    protected $view_path='modules.access_control.sidebar_map';

    public function index(){

    	//dd(sidebar_map()['html']);

        $data=[
            'sidebar_maps'=>\App\SidebarMap::orderBy('sorting_order')->get(),
            'model'=>new \App\SidebarMap,
            'route_permits'=>\App\RoutePermit::all()->pluck('permission', 'id'),
            'sidebar_html'=>$this->jquery_nestable(\App\SidebarMap::orderBy('sorting_order')->get())
        ];

        return $this->view('index', $data);

    }

    public function create(){

    }


    public function store(Request $request){
    	
    	//dd($request->all());

    	$request->validate([
    		//'parent_id'=>'nullable|exists:sidebar_maps',
    		'name'=>'required|unique:sidebar_maps',
    		'icon_type'=>'required',
    		'icon'=>'required',
    		'route_permit_id'=>'required|exists:route_permits,id',
    		'active'=>'required|boolean'
    	]);

    	//dd($request->name);

    	$sidebar_map=new \App\SidebarMap;
    	$sidebar_map->fill($request->all());
    	$sidebar_map->key=str_slug($request->name);
    	$sidebar_map->save();
    	return back()->with(['success'=>'Sidebar Map Created Successfully.']);

    }


    public function show($id){
        
    }


    public function edit(\App\SidebarMap $sidebar_map){

    	//dd($sidebar_map);

        $data=[
            'sidebar_maps'=>\App\SidebarMap::orderBy('sorting_order')->get(),
            'model'=>$sidebar_map,
            'route_permits'=>\App\RoutePermit::all()->pluck('permission', 'id'),
            'sidebar_html'=>$this->jquery_nestable(\App\SidebarMap::orderBy('sorting_order')->get())
        ];

        return $this->view('index', $data);

    }


    public function update(Request $request, \App\SidebarMap $sidebar_map){

    	//dd($request->all());

    	$request->validate([
    		//'parent_id'=>'nullable|exists:sidebar_maps',
    		'name'=>"required|unique:sidebar_maps,name,{$sidebar_map->id}",
    		'icon_type'=>'required',
    		'icon'=>'required',
    		'route_permit_id'=>'required|exists:route_permits,id',
    		'active'=>'required|boolean'
    	]);

    	//dd($request->all());

    	$sidebar_map->fill($request->all());
    	$sidebar_map->key=str_slug($request->name);
    	$sidebar_map->save();
    	return back()->with(['success'=>'Sidebar Map Updated Successfully.']);

    }


    public function destroy($id){
        
    }

    public function change_sidebar_order(Request $request){


    	//die(\Log::info(print_r($request->all(), true)));

    	return response()->json($this->iterate_map($request->map));


    }

    protected function iterate_map($data, $parent_id=NULL, $step=0){

    	foreach($data as $row){

    		$step++;

    		$sidebar_map=\App\SidebarMap::find($row['id']);

    		if($parent_id){

    			$sidebar_map->parent_id=$parent_id;
    			$sidebar_map->sorting_order=$step;
    			$sidebar_map->save();

    		}else{

    			$sidebar_map->parent_id=NULL;
    			$sidebar_map->sorting_order=$step;
    			$sidebar_map->save();

    		}

    		if(isset($row['children'])){
    			$step=$this->iterate_map($row['children'], $row['id'], $step);
    		}
    	}

    	return $step;

    }

	protected function jquery_nestable($model, $printed=[]){

		$html='<ol class="dd-list">';
		$content='';

		foreach($model as $row){

			$permission='Not Specified';

			if($row->route_permit()->exists()){
				$permission=$row->route_permit->permission;
			}

			if(in_array($row->id, $printed)) continue;
			array_push($printed, $row->id);

			$active="<span class='label label-danger'>Disabled</span>";
			if($row->active) $active="<span class='label label-success'>Active</span>";

			$content.="<li class='dd-item' data-id='{$row->id}'>";
			$content.="<div class='dd-handle' title='Permission: {$permission}'>{$row->name} {$active} </div>";
			if($row->child_menus()->exists()){
				$nested=$this->jquery_nestable($row->child_menus()->orderBy('sorting_order')->get(), $printed);
				$content.=$nested['html'];
				$printed=$nested['printed'];
			}
			$content.="</li>";

		}

		$end='</ol>';

		return [
			'html'=>$html.$content.$end,
			'printed'=>$printed
		];

	}

}
