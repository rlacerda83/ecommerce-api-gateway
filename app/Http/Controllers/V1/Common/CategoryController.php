<?php

namespace App\Http\Controllers\V1\Common;

use App\Services\Integrator\Microservices\Category;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Dingo\Api\Exception\StoreResourceFailedException;
use Laravel\Lumen\Routing\Controller as BaseController;

class CategoryController extends BaseController
{
    use Helpers;

    /**
     * @var Category
     */
    private $integrator;

    /**
     * ProductController constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->integrator = $category;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        try {
            $products = $this->integrator->getAll($request);

            return Response()->json($products);
        } catch (\Exception $e) {
            throw new StoreResourceFailedException($e->getMessage());
        }
    }

}
