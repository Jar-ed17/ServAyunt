<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Medidas;
use App\Models\Lamparas;
use App\Models\altura;
use App\Models\dependencia;
use App\Models\estatus;
use App\Models\potencia;
use App\Models\tipoposte;
use App\Models\transformador;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $medidas =  Medidas::all();           
        $lamparas =  Lamparas::all()->where('EsTecnologia', 1);    
        $tipo_luminaria =  Lamparas::all()->where('EsTecnologia', 2);    
        $altura =  altura::all();        
        $dependencia =  dependencia::all();    
        $estatus =  estatus::all();        
        $potencia =  potencia::all();    
        $tipoposte =  tipoposte::all();        
        $transformador =  transformador::all(); 

        View::share([
            'medidas' => $medidas, 
            'lamparas' => $lamparas,
            'altura' => $altura, 
            'dependencia' => $dependencia,
            'estatus' => $estatus, 
            'potencia' => $potencia,
            'tipoposte' => $tipoposte,
            'transformador' => $transformador,
            'tipo_luminaria' => $tipo_luminaria
        ]);
    }
}
