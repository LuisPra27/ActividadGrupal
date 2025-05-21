<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoapController extends Controller
{
    public function consumir()
    {
        $wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
        $client = new \SoapClient($wsdl);

        // Llamar al método 'ListOfCountryNamesByName'
        $result = $client->ListOfCountryNamesByName();

        return response()->json($result);
    }
}
