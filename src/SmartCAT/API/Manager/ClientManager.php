<?php
/**
 * Created by PhpStorm.
 * User: Diversant_
 * Date: 09.01.2017
 * Time: 10:59
 */

namespace SmartCAT\API\Manager;


use SmartCAT\API\Resource\ClientResource;

class ClientManager extends ClientResource
{

    /**
     *
     *
     * @param string $name имя клиента
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return string
     */
    public function clientCreateClient($name, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $name = "\"$name\"";
        $promise = parent::clientCreateClient($name, $parameters, self::FETCH_PROMISE);
        if (self::FETCH_PROMISE === $fetch) {
         return $promise;
        }
        $response = $promise->wait();
        $res = $response->getBody()->getContents();
        $res = str_replace('"', '', $res);
        return $res;
    }
}