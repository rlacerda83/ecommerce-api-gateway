<?php

namespace App\Http\Controllers\V1\Common;

use App\Services\Integrator\Microservices\Category;
use App\Services\Integrator\Microservices\Recommendation;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Exception\StoreResourceFailedException;
use Laravel\Lumen\Routing\Controller as BaseController;

class RecommendationController extends BaseController
{
    use Helpers;

    /**
     * @var Category
     */
    private $integrator;

    /**
     * ProductController constructor.
     * @param Recommendation $recommendation
     */
    public function __construct(Recommendation $recommendation)
    {
        $this->integrator = $recommendation;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getWhoViewAlsoView(Request $request)
    {
        try {
            $recommendations = $this->integrator->getWhoViewAlsoView($request);

            return Response()->json($recommendations);
        } catch (\Exception $e) {
            throw new StoreResourceFailedException($e->getMessage());
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getWhoBougthAlsoBougth(Request $request)
    {
        try {
            $recommendations = $this->integrator->getWhoViewAlsoView($request);

            return Response()->json($recommendations);
        } catch (\Exception $e) {
            throw new StoreResourceFailedException($e->getMessage());
        }
    }

}
