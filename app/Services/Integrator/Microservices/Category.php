<?php

namespace App\Services\Integrator\Microservices;

use App\Services\Integrator\Client;
use Illuminate\Http\Request;

class Category extends Client
{

    protected $url;

    const QS_FEATURED = '/featureds';
    const QS_DETAIL = '/%s/details-page';

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->url = env('MICROSERVICE_CATALOG_URL') . 'categories';
        parent::__construct($this->url);
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
}
