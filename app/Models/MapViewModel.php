<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MapViewModel extends Model
{
    use HasFactory;

    public function getEspectaculares(){
        $espectaculares = DB::table('espectaculares')->get();
        return $espectaculares;
    }

    public function getVallas(){
        $espectaculares = DB::table('vallas_fijas')->get();
        return $espectaculares;
    }

    public function getMediosByType($medio){

        $medio = DB::table('medios')
            ->join($medio, 'medios.id', '=', $medio.'.id_medio')
            ->where('medio.tipo_medio', '=', $medio)
            ->select()
            ->get();
            return $medio;


    }

    
}
