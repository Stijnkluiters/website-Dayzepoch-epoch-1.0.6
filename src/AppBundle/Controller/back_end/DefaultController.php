<?php

namespace AppBundle\Controller\back_end;

use AppBundle\Form\NewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\News;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DefaultController extends Controller
{
    /**
     * @Route("/admin/index", name="bindex")
     */
    public function index(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('back_end/index.html.twig');
    }
    /**
     * @Route("/admin/news", name="bnews")
     */
    public function newsIndex(Request $request)
    {
        // First get all news rows
        // create a new entity, gather all rows. return to the page view.
        $news = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();

        $news = new News();

        $form = $this->createForm(NewsType::class,$news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $news->getImage();
            $fileName = $this->get('app.images_uploader')->upload($file);
            $news->setImage($fileName);

            /** @var News $task */
            $task = $form->getData();
            $newsobject = new News();
            $newsobject->setTitle($task->getTitle());
            $newsobject->setContent($task->getContent());

            $em = $this->getDoctrine()->getManager();
            $em->persist($cortina);
            $em->flush();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('back_end/news.html.twig', [
            'news' => $news,
            'form'  => $form->createView()
        ]);
    }
    public function newsDelete(Request $request) {

        $params = $request->request->all();



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
}
