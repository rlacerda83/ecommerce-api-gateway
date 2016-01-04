<?php

namespace App\Http\Controllers\V1\Web;

use App\Services\Integrator\Microservices\Product;
use App\Transformers\DefaultTransformer;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Illuminate\Support\Collection;
use Laravel\Lumen\Routing\Controller as BaseController;
use QueryParser\QueryParserException;

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
     * @param $idSKu
     * @return \Dingo\Api\Http\Response
     */
    public function getDetailsPage($idSKu)
    {
        $product = $this->integrator->getDetailPage($idSKu);
        if (! $product) {
            throw new StoreResourceFailedException('Product not found');
        }

        return Response()->json($product);
    }


}
