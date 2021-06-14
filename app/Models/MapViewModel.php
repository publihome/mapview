<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MapViewModel extends Model
{
    use HasFactory;

    public function selectdata($medio){
        return array(
            $medio.'.calle',
            $medio.'.colonia',
            $medio.'.localidad',
            $medio.'.municipio',
            $medio.'.latitud',
            $medio.'.longitud',
            $medio.'.referencias',
            $medio.'.vista_corta',
            $medio.'.vista_media',
            $medio.'.vista_larga',
            'medios.tipo_medio',
            'medios.status',
        );
    }

    public function getEspectaculares(){
        $espectaculares = DB::table('espectaculares')
                                ->join('medios', 'medios.id', "=" ,'espectaculares.id_medio')
                                ->select($this->selectdata('espectaculares'))
                                // ->select('espectaculares.calle', 'espectaclares.colonia', 'espectaculares.localidad', 'espectaculares.municipio', 'espectaculares.latitud', 'espectaculares.longitud','espectaculares.referencias', 'espectaculares.vista_corta','espectaculares.vista_larga','espectaculares.vista_media','medios.tipo_medio','medios.status')
                                ->get();
        return $espectaculares;
    }

    public function getVallas(){
        $vallas = DB::table('vallas_fijas')
                                ->join('medios', 'medios.id', "=" ,'vallas_fijas.id_medio')
                                ->select($this->selectdata('vallas_fijas'))
                                ->get();
        return $vallas;
    }

    public function getDataByMedio($medio){
        $info_medio = DB::table($medio)
                            ->join('medios', 'medios.id', "=" ,$medio.'.id_medio')
                            ->select($this->selectdata($medio))
                            ->get();
        return response($info_medio);
    }
    

    
}
