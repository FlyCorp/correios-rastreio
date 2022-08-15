<?php

namespace FlyCorp\RastreioCorreios;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\RuntimeException;

class RastreioCorreiosHelper
{
    /**
     * Get the app's version string
     *
     * If a file <base>/version exists, its contents are trimmed and used.
     * Otherwise we get a suitable string from `git describe`.
     *
     * @throws Exception\CouldNotGetVersionException if there is no version file and `git
     * describe` fails
     * @return string Version string
     */
    public static function getTraking($code)
    {
        dd(self::auth(["user","pass"]));
       return $code;
    }
    private  function auth($credentials){

        $ArrayTBase64(function($data) use ($credentials){
            
            foreach ($credentials  as $key => $value) {
         
                $value.$value;
         
            }

            return base64_encode($value);

        });

        dd($ArrayTBase64);

        $request  = new \GuzzleHttp\Client();

        $response = $request->post("https://api.correios.com.br/token/v1/autentica/cartaopostagem", [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => sprintf('Basic %s',$$ArrayTBase64),
            ],
            'json' => [

                'numero'         => '0076423590',
            ]
        ]);
    }
   
}
