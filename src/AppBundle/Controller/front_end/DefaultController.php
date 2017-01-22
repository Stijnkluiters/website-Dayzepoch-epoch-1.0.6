<?php

namespace AppBundle\Controller\front_end;

use AppBundle\Entity\News;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\FilesystemCache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with w hatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/tutorial", name="tutorial")
     */
    public function tutorialAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/tutorial.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/rules", name="rules")
     */
    public function rulesAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/rules.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/news", name="news")
     */
    public function newsAction(Request $request)
    {
        $news = $this->getDoctrine()
            ->getRepository('AppBundle:News')
            ->findAll();

        // replace this example code with whatever you need
        return $this->render('default/news.html.twig', [
            'allnews'  => $news
        ]);
    }
    /**
     * @Route("/traderitems", name="trader")
     */
    public function traderAction(Request $request){


        $directory = $this->container->getParameter('Cache');
        $cache = new FilesystemCache($directory);
        $products = $cache->fetch('products');
        if($products === false) {
            $products = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->findAll();
            $cache->save('products',$products);
        }
        // replace this example code with whatever you need
        return $this->render('default/trader.html.twig', [
            'products'  => $products
        ]);
    }
}
