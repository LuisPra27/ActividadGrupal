<?php
// filepath: app/Http/Controllers/SoapController.php


namespace App\Http\Controllers;

use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

class SoapController extends Controller
{
    public function consumirServicio()
    {
        SoapWrapper::add('MiServicio', function ($service) {
            $service
                ->wsdl('URL_DEL_WSDL')
                ->trace(true);
        });

        $response = SoapWrapper::call('MiServicio.Metodo', [
            'param1' => 'valor1',
            // otros parámetros
        ]);

        return response()->json($response);
    }
}
