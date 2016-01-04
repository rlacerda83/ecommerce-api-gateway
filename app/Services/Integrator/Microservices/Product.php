<?php

namespace App\Services\Integrator\Microservices;

use App\Services\Integrator\Client;
use Illuminate\Http\Request;

class Product extends Client
{

    const QS_FEATURED = '/featureds';
    const QS_DETAIL = '/%s/details-page';

    /**
     * Product constructor.
     */
    public function __construct()
    {
        parent::__construct(env('MICROSERVICE_CATALOG_URL') . 'products');
    }

    /**
     * @param Request $request
     * @return bool|mixed
     * @throws \Exception
     */
    public function getFeatureds(Request $request)
    {
        $options = $this->parseQueryString($request);
        return $this->sendRequest(self::QS_FEATURED, $options);
    }

    /**
     * @param $idSku
     * @return bool|mixed
     * @throws \Exception
     */
    public function getDetailPage($idSku)
    {
        $method = sprintf(self::QS_DETAIL, $idSku);
        return $this->sendRequest($method);
    }

}
