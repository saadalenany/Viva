<?php

namespace App\Http\Controllers;

use App\models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function getIndex(){
        $inputs = Input::all();
        print_r($inputs);

        $arrivalDate = Carbon::createFromFormat('m/d/Y', $inputs['arrivalDate']);
        $departDate = Carbon::createFromFormat('m/d/Y', $inputs['departDate']);
        $cities_id = $inputs['cities_id'];
        $numOfRooms = $inputs['numOfRooms'];
        $numOfAdults = $inputs['numOfAdults'];

        $result = $this->fetchResults($arrivalDate, $departDate, $numOfRooms, $numOfAdults, $cities_id);
        print_r($result);

        return View::make('search.index');
    }

    public function fetchResults($arrivalDate, $departDate, $numOfRooms, $numOfAdults, $cities_id){
        $city = City::with('country')->where('id', $cities_id)->first();

        $password = md5('xzuaA0b$');

        $xml = '<customer>'
            .'<username>01004443888</username>'
            .'<password>'.$password.'</password>'
            .'<id>1348055</id>'
            .'<source>1</source>'
            .'<product>hotel</product>'
            .'<request command="searchhotels">'
            .'<bookingDetails>'
            .'<fromDate>'.$arrivalDate->format('Y-m-d').'</fromDate>'
            .'<toDate>'.$departDate->format('Y-m-d').'</toDate>'
            .'<currency>520</currency>'
            .'<rooms no="2">'
            .'<room runno="0">'
            .'<adultsCode>2</adultsCode>'
            .'<children no="0"></children>'
            .'<rateBasis>-1</rateBasis>'
            .'<passengerNationality>'.$city->countries_code.'</passengerNationality>'
            .'<passengerCountryOfResidence>'.$city->countries_code.'</passengerCountryOfResidence>'
            .'</room>'
            .'<room runno="1">'
            .'<adultsCode>2</adultsCode>'
            .'<children no="1">'
            .'<child runno="0">6</child>'
            .'</children>'
            .'<rateBasis>-1</rateBasis>'
            .'<passengerNationality>'.$city->countries_code.'</passengerNationality>'
            .'<passengerCountryOfResidence>'.$city->countries_code.'</passengerCountryOfResidence>'
            .'</room>'
            .'</rooms>'
            .'</bookingDetails>'
            .'<return>'
            .'<filters xmlns:a="http://us.dotwconnect.com/xsd/atomicCondition" xmlns:c="http://us.dotwconnect.com/xsd/complexCondition">'
            .'<city>'.$cities_id.'</city>'
            .'<nearbyCities>false</nearbyCities>'
            .'<c:condition>'
            .'<a:condition>'
            .'<fieldName>price</fieldName>'
            .'<fieldTest>between</fieldTest>'
            .'<fieldValues>'
            .'<fieldValue>20</fieldValue>'
            .'<fieldValue>300</fieldValue>'
            .'</fieldValues>'
            .'</a:condition>'
            .'</c:condition>'
            .'</filters>'
            .'</return>'
            .'</request>'
            .'</customer>';

        print $xml;
        


        $url = "http://xmldev.dotwconnect.com/gatewayV3.dotw"; //"http://xmldev.DOTWconnect.com/gatewayV3.dotw";
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $xml );
        $data = curl_exec($ch);
        curl_close($ch);

        return response($data, 200)
            ->header('Content-Type', 'application/xml');

        //convert the XML result into array
        $array_data = json_decode(json_encode(simplexml_load_string($data)), true);

        $count = $array_data['cities']['@attributes'];
        print_r($count);
        print_r('<br/>');
        foreach($array_data['cities']['city'] as $item){
            $inputs = [
                'countries_code'=>$item['countryCode'],
                'id'=>$item['code'],
                'name'=>$item['name'],
                'countryName'=>$item['countryName'],
            ];
            $i = City::firstOrCreate($inputs);
            print_r($i->name.' Inserted<br/>');
//            print_r($item);
            print_r('<br/>');
        }
    }
}
