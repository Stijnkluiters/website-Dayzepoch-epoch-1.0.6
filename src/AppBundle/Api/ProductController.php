<?php
/**
 * Created by PhpStorm.
 * User: stijn
 * Date: 22-1-2017
 * Time: 15:50
 */

namespace AppBundle\Api;


use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class ProductController
{

    /**
     * @Route("/api/getAll/{slug}", name="getmethod")
     */
    public function getMethod(Request $request,$slug)
    {
//        /** @var Product $repository */
//        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
//        // Check if method exists as requested.
//        $products = $repository->findBy(
//            array('type' => $slug)
//        );
//        return new JsonResponse($products,200);
    }


}