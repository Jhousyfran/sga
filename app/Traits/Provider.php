<?php

namespace App\Traits;

use \Firebase\JWT\JWT;

trait Provider
{

    public static function getProviderLogged($token = false, $object = false)
    {
        try {
            if (!$token && defined("TOKEN")) {
                $token = TOKEN;
            }
            $jwt = JWT::decode($token, env('APP_KEY') . request()->ip(), array('HS256'));

            if ($jwt->expirationDate < (new \DateTime())->getTimestamp()) {
                return null;
            }
            if ($object) {
                return ($jwt->class)::find($jwt->id);
            }

            return $jwt->dados;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function generateToken($inputData = "")
    {
        $date = new \DateTime();
        $date->add(new \DateInterval('PT6H'));

        $primaryKey = $this->primaryKey;
        $dados = [
            'id' => $this->$primaryKey,
            'class' => self::class,
            'dados' => $inputData != "" ? $inputData : $this,
            'expirationDate' => $date->getTimestamp(),
        ];

        return JWT::encode($dados, env('APP_KEY') . request()->ip());
    }

}
