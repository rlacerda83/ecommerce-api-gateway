<?php

namespace App\Http\Controllers\V1\Common;

use App\Services\Integrator\Microservices\Product;
use App\Transformers\DefaultTransformer;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Exception\StoreResourceFailedException;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    use Helpers;

    /**
     * @var Product
     */
    private $integrator;

    /**
     * ProductController constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->integrator = $product;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getFeaturedProducts(Request $request)
    {
        try {
            $products = $this->integrator->getFeatureds($request);

            return Response()->json($products);
        } catch (\Exception $e) {
            throw new StoreResourceFailedException($e->getMessage());
        }
    }

}
