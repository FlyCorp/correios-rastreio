<?php

namespace FlyCorp\RastreioCorreios;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\RuntimeException;
use Cache;

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
        
      return self::requestCorreios($code);

    }
    public static function requestCorreios($code) 
    {

        if(self::auth([env("CORREIOS_USUARIO"),env("CORREIOS_SENHA")]) == "unattended."){
            return [
                "status" => "error",
                "message" => "Não autenticado verifique credenciais do ENV conforme documentação" 
            ];
        }

        $request  = new \GuzzleHttp\Client();

        $response = $request->get(sprintf("https://api.correios.com.br/srorastro/v1/objetos/%s?resultado=T&",$code), [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => self::auth([env("CORREIOS_USUARIO"),env("CORREIOS_SENHA")]),
            ]
        ]);

        return json_decode($response->getBody());

    }
    public static function  checkEnvVar(){


    }
    public static  function auth($credentials){
       try {
        $token = Cache::remember('token', 30, function () use ($credentials){

            $ArrayTBase64 = null;

            $ArrayTBase64 = function($credentials) {
    
                return  sprintf("Basic %s",base64_encode(implode(":",$credentials)));
    
            };
    
            $request  = new \GuzzleHttp\Client();
    
            $response = $request->post("https://api.correios.com.br/token/v1/autentica/cartaopostagem", [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $ArrayTBase64($credentials),
                ],
                'json' => [
    
                    'numero'         => env("CORREIOS_CARTAO"),
                ]
            ]);
    
    
            $data = json_decode($response->getBody());
    
            if(isset($data->token)){

                return sprintf("Bearer %s",$data->token);

            }else{

                return("unattended.");
                
            }
    
          });

          return $token;
       } catch (\Throwable $th) {

        return("unattended.");
       }


    }
   
}
