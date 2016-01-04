<?php

namespace App\Services\Integrator\Microservices;

use App\Services\Integrator\Client;
use Illuminate\Http\Request;

class Category extends Client
{

    const QS_TREE = '/tree';

    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct(env('MICROSERVICE_CATALOG_URL') . 'categories');
    }

    /**
     * @param Request $request
     * @return bool|mixed
     * @throws \Exception
     */
    public function getAll(Request $request)
    {
        $options = $this->parseQueryString($request);
        return $this->sendRequest('', $options);
    }

    /**
     * @return bool|mixed
     * @throws \Exception
     */
    public function getTree()
    {
        return $this->sendRequest(self::QS_TREE);
    }
}
