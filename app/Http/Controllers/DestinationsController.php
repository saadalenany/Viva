<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DestinationsController extends Controller
{
    public function getIndex(){
        $password = md5('xzuaA0b$');

        $xml = '<customer>'
                    .'<username>01004443888</username>'
                    .'<password>'.$password.'</password>'
                    .'<id>1348055</id>'
                    .'<source>1</source>'
                    .'<product>hotel</product>'
                    .'<request command="searchhotels">'

                    ////// Request PARA
                        .'<bookingdetails>'
                            .'<fromdate>dotw date format</fromdate>'
                            .'<todate>dotw date format</todate>'
                            .'<currency>currency internal code</currency>'
                            .'<commision></commision>'
                            .'<rooms no="">'
                               .'<room runno="">'
                                    .'<adultscode>adults</adultscode>'
                                    .'<children no="">'
                                        .'<child runno="">child age</child>'
                                    .'</children>'
                                    .'<ratebasis>room rate basis</ratebasis>'
                                    .'<passengernationality></passengernationality>'
                                    .'<passengercountryofresidence></passengercountryofresidence>'
                                .'</room>'
                            .'</rooms>'
                            .'<productcoderequested>product code</productcoderequested>'
                        .'</bookingdetails>'
                        .'<return>'
                            .'<getrooms>true</getrooms>'
                            .'<filters xmlns:a="http://us.dotwconnect.com/xsd/atomicCondition" xmlns:c="http://us.dotwconnect.com/xsd/complexCondition">'
                                .'<city></city>'
                                .'<country></country>'
                                .'<ratetypes>'
                                    .'<ratetype></ratetype>'
                                .'</ratetypes>'
                                .'<c:condition>'
                                    .'<a:condition>'
                                        .'<fieldname>fieldName</fieldname>'
                                        .'<fieldtest>fieldTest</fieldtest>'
                                        .'<fieldvalues>'
                                            .'<fieldvalue>fieldValue</fieldvalue>'
                                        .'</fieldvalues>'
                                    .'</a:condition>'
                                    .'<operator>operator</operator>'
                                    .'<a:condition>'
                                        .'<fieldname>fieldName</fieldname>'
                                        .'<fieldtest>fieldTest</fieldtest>'
                                        .'<fieldvalues>'
                                            .'<fieldvalue>fieldValue</fieldvalue>'
                                        .'</fieldvalues>'
                                    .'</a:condition>'
                                .'</c:condition>'
                            .'</filters>'
                            .'<resultsperpage></resultsperpage>'
                            .'<page></page>'
                        .'</return>'
                    ///// END Request Para'

                    .'</request>'
                .'</customer>';


        $url = "http://xmldev.DOTWconnect.com/gatewayV3.dotw";
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

        print_r('<pre>');
        print_r($array_data);
        print_r('</pre>');
    }

    public function getCountries(){
        $password = md5('xzuaA0b$');

        $xml = '<customer>'
            .'<username>01004443888</username>'
            .'<password>'.$password.'</password>'
            .'<id>1348055</id>'
            .'<source>1</source>'
            //.'<product>hotel</product>'
            .'<request command="getallcountries">'
                .'<return>'
                .'<fields>'
                    .'<field>regionName</field>'
                    .'<field>regionCode</field>'
                .'</fields>'
                .'</return>'
            .'</request>'
            .'</customer>';


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

        print_r('<pre>');
        print_r($array_data);
        print_r('</pre>');
    }
}
