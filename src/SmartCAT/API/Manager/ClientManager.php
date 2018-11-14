<?php

namespace SmartCat\Client\Manager;

use SmartCat\Client\Resource\ClientResource;

class ClientManager extends ClientResource
{
    use SmartCatManager;

    /**
     * @param string $name имя клиента
     * @param array $parameters List of parameters
     * @param string $fetch Fetch mode (object or response)
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
