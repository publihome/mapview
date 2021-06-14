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

    // public function index(){
    //     return view('public.mapview');
    // }

    public function getData(){
        $data["espectaculares"] = $this->MapModel->getEspectaculares();
        $data["vallas"] = $this->MapModel->getVallas();
        return response($data);
    }

    public function getDataByMedio(Request $request){
        $medio = $request->input('type');
         return $this->MapModel->getDataByMedio($medio);
        
    }

}
