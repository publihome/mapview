<?php

namespace App\Http\Controllers;

use App\Models\MapViewModel;
use Illuminate\Http\Request;

class MapViewController extends Controller
{
    //
    private $MapModel;

    public function __construct()
    {

        $this->MapModel = new MapViewModel;
        
    }

    public function index(){
        return view('public.mapview');
    }

    public function getData(){
        return $this->MapModel->getEspectaculares();
    }

    public function getinfo(Request $request){
        $medio = $request->input();
        return $medio;
        exit;
        return $this->MapModel->getMediosByType();
    }
}
