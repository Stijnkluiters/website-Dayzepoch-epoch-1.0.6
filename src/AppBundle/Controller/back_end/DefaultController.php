<?php

namespace AppBundle\Controller\back_end;

use AppBundle\Entity\Product;
use AppBundle\Form\NewsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\News;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DefaultController extends Controller
{
    protected function importer()
    {
        $string = $this->string();
        $array = explode('class', trim($string));
        $arraymapped = array_map('trim', $array);
        foreach ($arraymapped as $value) {
            $haystack = substr($value, 0, strpos($value, ' '));


            if (strpos($value, $haystack) !== false) {
                $values[] = explode(';', str_replace($haystack, '', $value));
                foreach ($values as $search) {

                    foreach ($search as $value2) {
                        sleep(0.1);
                        if (strpos($value2, 'buy') !== false) {
                            if (!isset($buy)) {

                                if (strpos($value2, 'ItemGoldBar10oz') !== false) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }

                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $buy['ItemGoldBar10oz'] = intval($int);
                                    }
                                } elseif
                                (strpos($value2, 'ItemSilverBar10oz') !== false
                                ) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $buy['ItemSilverBar10oz'] = intval($int);
                                    }
                                } elseif
                                (strpos($value2, 'ItemBriefcase100oz') !== false
                                ) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $buy['ItemBriefcase100oz'] = intval($int);
                                    }
                                } elseif
                                (strpos($value2, 'ItemSilverBar') !== false
                                ) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $buy['ItemSilverBar'] = intval($int);
                                    }
                                } elseif
                                (strpos($value2, 'ItemGoldBar') !== false
                                ) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $buy['ItemGoldBar'] = intval($int);
                                    }
                                }
                            }
                        }
                        if (strpos($value2, 'sell') !== false) {
                            if (!isset($sell)) {
                                if (strpos($value2, 'ItemGoldBar10oz') !== false) {

                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $sell['ItemGoldBar10oz'] = intval($int);
                                    }
                                } elseif (strpos($value2, 'ItemSilverBar10oz') !== false) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $sell['ItemSilverBar10oz'] = intval($int);
                                    }
                                } elseif (strpos($value2, 'ItemBriefcase100oz') !== false) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $sell['ItemBriefcase100oz'] = intval($int);
                                    }
                                } elseif (strpos($value2, 'ItemSilverBar') !== false) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $sell['ItemSilverBar'] = intval($int);
                                    }
                                } elseif (strpos($value2, 'ItemGoldBar') !== false) {
                                    $qty = substr($value2, 6, strpos($value2, '={'));
                                    if ($qty == '') {
                                        dump($value2);
                                        exit;
                                    }
                                    $int = filter_var($qty, FILTER_SANITIZE_NUMBER_INT);
                                    if (strpos($int, 'oz') === false) {
                                        $sell['ItemGoldBar'] = intval($int);
                                    }
                                }
                            }
                        }
                        if (strpos($value2, 'type') !== false) {

                            if (strpos($value2, 'trade_any_vehicle') !== false) {
                                $type = 'trade_any_vehicle';
                            }
                            if (strpos($value2, 'trade_any_bicycle') !== false) {
                                $type = 'trade_any_bicycle';
                            }
                            if (strpos($value2, 'trade_weapons') !== false) {
                                $type = 'trade_weapons';
                            }
                            if (strpos($value2, 'trade_items') !== false) {
                                $type = 'trade_items';
                            }
                            if (strpos($value2, 'trade_any_boat') !== false) {
                                $type = 'trade_any_boat';
                            }
                            if (strpos($value2, 'trade_backpacks') !== false) {
                                $type = 'trade_backpacks';
                            }
                            if (strpos($haystack, 'Rnd') !== false) {
                                $type = 'trade_ammo';
                            }
                            if (strpos($haystack, 'Food') !== false) {
                                $type = 'trade_food';
                            }
                            if (strpos($haystack, 'Soda') !== false) {
                                $type = 'trade_drink';
                            }

                        }
                    }
                    $products[$haystack] = [
                        'type' => $type,
                        'buy' => $buy,
                        'sell' => $sell,
                    ];
                    if (isset($sell)) {
                        $sell = null;
                    }
                    if (isset($buy)) {
                        $buy = null;
                    }
                    if (isset($type)) {
                        $type = null;
                    }
                }


            }
        }

        foreach ($products as $productkey => $product) {
            $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
            $dbproduct = $repository->findBy(['name' => $productkey]);
            foreach ($product as $key => $val) {
                if (!is_array($product['buy'])) {
                    dump($productkey);
                }
            }
            if (count($dbproduct) == 0) {
                $productobject = new Product();
                $productobject->setName($productkey);
                $productobject->setCategory($product['type']);

                $productobject->setBuyname($key = key($product['buy']));
                $productobject->setBuyqty($product['buy'][$key]);

                $productobject->setSellname($key = key($product['sell']));
                $productobject->setSellqty($product['sell'][$key]);

                $em = $this->getDoctrine()->getManager();
                $em->persist($productobject);
                $em->flush();
            }

        }
        echo "<pre>";
        var_dump($products);
        echo "</pre>";
        exit;
    }

    /**
     * @Route("/admin/index", name="bindex")
     */
    public
    function index(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('back_end/index.html.twig');
    }

    /**
     * @Route("/admin/news", name="bnews")
     */
    public
    function newsIndex(Request $request)
    {



        $news = new News();

        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */


            /** @var News $task */
            $task = $form->getData();
            $news->setTitle($task->getTitle());
            $news->setContent($task->getContent());

            $file = $news->getImage();
            $fileName = $this->get('app.images_uploader')->upload($file);
            $news->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('bnews');
        }

        return $this->render('back_end/news.html.twig', [
            'news' => $news,
            'form' => $form->createView()
        ]);
    }

    public
    function newsDelete(Request $request)
    {

        $params = $request->request->all();


    }

    /**
     * @Route("/rules", name="rules")
     */
    public
    function rulesAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/rules.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
    public function string(){
        // First get all news rows
        // create a new entity, gather all rows. return to the page view.
        return "

	class G36C_DZ {type = \"trade_weapons\";	buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class G36C_camo {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36A_Camo_DZ {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36K_Camo_DZ {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36C {type = \"trade_weapons\";	buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class G36a {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36K {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36A_camo {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36K_camo {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class G36_C_SD_camo {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class G36_C_SD_eotech {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class M16A2 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M16A2_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M16A4_DZ {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M16A2GL {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class m16a4 {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class m16a4_acg {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class M16A4_ACG_GL {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class M4A1_DZ {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M4A1_HWS_GL_camo {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class M4A1_HWS_GL_SD_Camo {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M4A1 {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M4A1_Aim {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M4A1_Aim_camo {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M4A1_RCO_GL {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class M4A1_AIM_SD_camo {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M4A3_RCO_GL_EP1 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class M4A3_CCO_EP1 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class SCAR_L_CQC {type = \"trade_weapons\";buy[] ={7,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class SCAR_L_CQC_CCO_SD {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={8,\"ItemGoldBar\"};};
	class SCAR_L_CQC_Holo {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class SCAR_L_CQC_EGLM_Holo {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class SCAR_L_STD_EGLM_RCO {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={7,\"ItemGoldBar\"};};
	class SCAR_L_STD_HOLO {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class SCAR_L_STD_Mk4CQT {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class L85_Holo_DZ {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class BAF_L85A2_RIS_SUSAT {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class BAF_L85A2_RIS_ACOG {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class BAF_L85A2_RIS_Holo {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class BAF_L85A2_UGL_SUSAT {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class BAF_L85A2_UGL_Holo {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class BAF_L85A2_UGL_ACOG {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class SA58_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Sa58V_CCO_EP1 {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class Sa58V_RCO_EP1 {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class Sa58P_EP1 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Sa58V_EP1 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};	
	class AKS74U_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class AKM_DZ {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class AK74_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class AK_74 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class AKS_GOLD {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
	class AKS_74_kobra {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class AKS_74_U {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class AK_47_M {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class AK_47_S {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class AKS_74_pso {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class AK_74_GL_kobra {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class AK_107_kobra {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class AK_107_pso {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class AK_107_GL_pso {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class FNFAL_DZ {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class FN_FAL_ANPVS4_DZE {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};	
	class FN_FAL {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class FN_FAL_ANPVS4 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class m8_compact {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class m8_sharpshooter {type = \"trade_weapons\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class m8_holo_sd {type = \"trade_weapons\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class m8_carbine {type = \"trade_weapons\";buy[] ={5,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class m8_carbine_pmc {type = \"trade_weapons\";buy[] ={5,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class M16A4_ACOG_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M16A4_CCO_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M16A2_GL_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M4A1_CCO_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class AK74_Kobra_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class AKM_Kobra_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};

	
	class 30Rnd_556x45_Stanag {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
	class 30Rnd_556x45_StanagSD {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class 30Rnd_556x45_G36 {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
	class 30Rnd_556x45_G36SD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 30Rnd_545x39_AK {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 30Rnd_545x39_AKSD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 30Rnd_762x39_AK47 {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 30Rnd_762x39_SA58 {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 20Rnd_762x51_FNFAL {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};

	class BAF_L86A2_ACOG {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class L110A1_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class M60A4_EP1_DZE {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M249_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M249_m145_EP1_DZE {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={9,\"ItemGoldBar\"};};
	class M249_EP1_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M240_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class m240_scoped_EP1_DZE {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class MG36 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class MG36_camo {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class Mk48_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class RPK_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class RPK_74 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class RPK74_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class UK59_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class PKM_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
	class Pecheneg_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M8_SAW {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class Mk48_CCO_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};


	class 100Rnd_556x45_M249 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 200Rnd_556x45_M249 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class 100Rnd_762x51_M240 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 50Rnd_762x54_UK59 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 75Rnd_545x39_RPK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 75Rnd_762x39_RPK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 100Rnd_762x54_PK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 100Rnd_556x45_BetaCMag {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 200Rnd_556x45_L110A1 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};


	class M9_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar\"};sell[] ={5,\"ItemSilverBar10oz\"};};	
	class G17_DZ {type = \"trade_weapons\";buy[] ={5,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class Makarov_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class Makarov {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class Revolver_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class revolver_gold_EP1 {type = \"trade_weapons\";buy[] ={3,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M1911_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class PDW_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class G17_FL_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class M9_SD_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={5,\"ItemSilverBar10oz\"};};
	class Makarov_SD_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	
	
	class 15Rnd_9x19_M9 {type = \"trade_items\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={5,\"ItemSilverBar\"};};
	class 15Rnd_9x19_M9SD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 17Rnd_9x19_glock17 {type = \"trade_items\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={5,\"ItemSilverBar\"};};
	class 17Rnd_9x19_glock17SD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 6Rnd_45ACP {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 7Rnd_45ACP_1911 {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 8Rnd_9x18_Makarov {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 8Rnd_9x18_MakarovSD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};

	
	class Crossbow_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={5,\"ItemSilverBar\"};};
	class RedRyder {type = \"trade_weapons\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={5,\"ItemSilverBar\"};};
	class MR43_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={8,\"ItemSilverBar\"};};
	class Winchester1866_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class M1014_DZ {type = \"trade_weapons\";buy[] ={3,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Remington870_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class LeeEnfield_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class Mosin_DZ {type = \"trade_weapons\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class Saiga12K {type = \"trade_weapons\";buy[] ={3,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Remington870_FL_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	
	class 1Rnd_Bolt_Tranquilizer {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 1Rnd_Bolt_Explosive {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 12Rnd_Quiver_Wood {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
	class 350Rnd_BB_Magazine {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 2Rnd_12Gauge_Buck {type = \"trade_items\";buy[] ={1,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 2Rnd_12Gauge_Slug {type = \"trade_items\";buy[] ={1,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 8Rnd_12Gauge_Slug {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={4,\"ItemSilverBar\"};};
	class 8Rnd_12Gauge_Buck {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={4,\"ItemSilverBar\"};};
	class 15Rnd_W1866_Slug {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 10Rnd_303British {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
	class 5Rnd_762x54_Mosin {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};

	class M4SPR {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M14_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class CZ550_DZ {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M24 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M24_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M24_des_EP1 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M40A3_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class SVD_DZ {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class SVD_des_EP1 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class SVD {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class SVD_CAMO {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class DMR {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class DMR_DZ {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class M14_EP1 {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M40A3 {type = \"trade_weapons\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class huntingrifle {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class SCAR_H_LNG_Sniper {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class SCAR_H_LNG_Sniper_SD {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class SCAR_H_CQC_CCO {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class SCAR_H_CQC_CCO_SD {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class SCAR_H_STD_EGLM_Spect {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M110_NVG_EP1 {type = \"trade_weapons\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class VSS_vintorez {type = \"trade_weapons\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class SVD_Gh_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};
	class M14_CCO_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class M40A3_Gh_DZ {type = \"trade_weapons\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar\"};};

	class 5Rnd_17HMR {type = \"trade_items\";buy[] ={1,\"ItemGoldBar\"};sell[] ={5,\"ItemSilverBar10oz\"};};
	class 5Rnd_762x51_M24 {type = \"trade_items\";buy[] ={1,\"ItemGoldBar\"};sell[] ={5,\"ItemSilverBar\"};};
	class 20Rnd_762x51_DMR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_B_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_SB_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 5Rnd_127x108_KSVK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 5Rnd_86x70_L115A1 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 10Rnd_762x54_SVD {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 10Rnd_9x39_SP5_VSS {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
	class 20Rnd_9x39_SP5_VSS {type = \"trade_items\";buy[] ={3,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};



class Sa61_EP1 {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; }; 
class UZI_SD_EP1 {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class UZI_EP1 {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; }; 
class MP5SD {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class MP5A5 {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class MP5_DZ {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class bizon {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; }; 
class Bizon_DZ {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; }; 
class bizon_silenced {type=\"trade_weapons\"; buy[] ={1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class Bizon_SD_DZ {type=\"trade_weapons\"; buy[] ={-1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };
class MP5_SD_DZ {type=\"trade_weapons\"; buy[] ={-1,\"ItemGoldBar10oz\"}; sell[] ={4,\"ItemGoldBar\"}; };

	
class 30rnd_9x19_MP5 {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={1,\"ItemSilverBar\"}; }; 
class 30Rnd_9x19_MP5SD {type=\"trade_items\"; buy[] ={5,\"ItemSilverBar10oz\"}; sell[] ={2,\"ItemSilverBar\"}; }; 
class 30Rnd_9x19_UZI {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={1,\"ItemSilverBar\"}; }; 
class 30Rnd_9x19_UZI_SD {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={8,\"ItemSilverBar\"}; }; 
class 64Rnd_9x19_SD_Bizon {type=\"trade_items\"; buy[] ={5,\"ItemSilverBar10oz\"}; sell[] ={2,\"ItemSilverBar\"}; }; 
class 64Rnd_9x19_Bizon {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={1,\"ItemSilverBar\"}; }; 
class 20Rnd_B_765x17_Ball {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={1,\"ItemSilverBar\"}; };

	
	class MMT_Civ {type = \"trade_any_bicycle\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
	class Old_bike_TK_INS_EP1 {type = \"trade_any_bicycle\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
	class Old_moto_TK_Civ_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class TT650_Civ {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class TT650_Ins {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class TT650_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class ATV_CZ_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class ATV_US_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class M1030_US_DES_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class tractor {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class tractorOld {type= \"trade_any_vehicle\"; buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	
	class Ikarus {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class Ikarus_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class S1203_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class S1203_ambulance_EP1 {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};


class Ural_INS {type=\"trade_any_vehicle\"; buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class Kamaz {type=\"trade_any_vehicle\"; buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class Ural_CDF {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class Ural_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class Ural_UN_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class UralCivil_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class UralCivil2_DZE {type = \"trade_any_vehicle\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class V3S_Open_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class V3S_Open_TK_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class V3S_Civ {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class V3S_RA_TK_GUE_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class V3S_TK_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class Kamaz_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class KamazOpen_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class MTVR_DES_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class MTVR {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};


class KamazRefuel_DZ {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; }; 
class MtvrRefuel_DES_EP1_DZ {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; }; 
class UralRefuel_TK_EP1_DZ {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; }; 
class V3S_Refuel_TK_GUE_EP1_DZ {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; }; 
class MtvrRefuel_DZ {type = \"trade_any_vehicle\";buy[] ={7,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class KamazRepair {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; }; 
class V3S_Repair_TK_GUE_EP1 {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"}; };

class UAZ_CDF {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class UAZ_INS {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class UAZ_RU {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class UAZ_Unarmed_TK_CIV_EP1 {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class UAZ_Unarmed_TK_EP1 {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class UAZ_Unarmed_UN_EP1 {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class LandRover_CZ_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class LandRover_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
class HMMWV_M1035_DES_EP1 {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class HMMWV_Ambulance {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class HMMWV_Ambulance_CZ_DES_EP1 {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class HMMWV_DES_EP1 {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class HMMWV_DZ {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class GAZ_Vodnik_MedEvac {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class M113Ambul_TK_EP1_DZ {type = \"trade_any_vehicle\";buy[] ={10,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemBriefcase100oz\"};};
class BMP2_Ambul_CDF {type = \"trade_any_vehicle\";buy[] ={15,\"ItemBriefcase100oz\"};sell[] ={7,\"ItemBriefcase100oz\"};};
class M1133_MEV_EP1 {type = \"trade_any_vehicle\";buy[] ={20,\"ItemBriefcase100oz\"};sell[] ={10,\"ItemBriefcase100oz\"};};

class policecar {type = \"trade_any_vehicle\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar\"};};
class SUV_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Camo {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Blue {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Charcoal {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Green {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Orange {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Pink {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Red {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Silver {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_White {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_Yellow {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class SUV_TK_CIV_EP1_DZE4 {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Camo_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Blue_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Charcoal_DZE4 {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Green_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Orange_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Pink_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Red_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Silver_DZE4 {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_White_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class SUV_Yellow_DZE4 {type=\"trade_any_vehicle\"; buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};


class hilux1_civil_3_open_EP1 {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};}; 
class datsun1_civil_3_open {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class datsun1_civil_2_covered {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class datsun1_civil_1_open {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class hilux1_civil_1_open {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class hilux1_civil_2_covered {type=\"trade_any_vehicle\"; buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class hilux1_civil_3_open_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class datsun1_civil_3_open_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class hilux1_civil_1_open_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class datsun1_civil_2_covered_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class datsun1_civil_1_open_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class hilux1_civil_2_covered_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};


	class Skoda {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class SkodaBlue {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class SkodaGreen {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class SkodaRed {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class VolhaLimo_TK_CIV_EP1 {type = \"trade_any_vehicle\";	buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Volha_1_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Volha_2_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class VWGolf {type = \"trade_any_vehicle\";buy[] ={3,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class car_hatchback {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class car_sedan {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class GLT_M300_LT {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class GLT_M300_ST {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Lada1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Lada1_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Lada2 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class Lada2_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class LadaLM {type = \"trade_any_vehicle\";buy[] ={3,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};


	class PartGeneric {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={6,\"ItemSilverBar\"};
	};
	class PartWheel {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};
	class PartGlass {
		type = \"trade_items\";
		buy[] ={1,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class PartEngine {
		type = \"trade_items\";
		buy[] ={5,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class PartVRotor {
		type = \"trade_items\";
		buy[] ={5,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class PartFueltank {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={5,\"ItemSilverBar\"};
	};
	class ItemFuelcan {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemFuelcanEmpty {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemJerrycan {
		type = \"trade_items\";
		buy[] ={4,\"ItemSilverBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};
	class ItemJerrycanEmpty {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemWatch {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemCompass {
		type = \"trade_weapons\";
		buy[] ={6,\"ItemSilverBar\"};
		sell[] ={3,\"ItemSilverBar\"};
	};
	class ItemMap {
		type = \"trade_weapons\";
		buy[] ={6,\"ItemSilverBar\"};
		sell[] ={3,\"ItemSilverBar\"};
	};
	class ItemGPS {
		type = \"trade_weapons\";
		buy[] ={1,\"ItemGoldBar\"}; 
		sell[] ={4,\"ItemSilverBar10oz\"};
	};
	class Binocular {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class Binocular_Vector {
		type = \"trade_weapons\";
		buy[] ={1,\"ItemGoldBar\"}; 
		sell[] ={4,\"ItemSilverBar10oz\"};
	};
	class NVGoggles {
		type = \"trade_weapons\";
		buy[] ={1,\"ItemGoldBar\"}; 
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class ItemFlashlight {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemFlashlightRed {
		type = \"trade_weapons\";
		buy[] ={1,\"ItemSilverBar10oz\"};
		sell[] ={5,\"ItemSilverBar\"};
	};
	class ItemMatchbox {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemEtool {
		type = \"trade_weapons\";
		buy[] ={9,\"ItemSilverBar10oz\"};
		sell[] ={6,\"ItemSilverBar10oz\"};
	};
	class ItemHatchet {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemKnife {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemToolbox {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class ItemCrowbar {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemMachete {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemFishingPole {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar10oz\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class ItemPickaxe {
		type = \"trade_weapons\";
		buy[] ={2,\"ItemSilverBar10oz\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class ItemSledge {
		type = \"trade_weapons\";
		buy[] ={8,\"ItemSilverBar10oz\"};
		sell[] ={4,\"ItemSilverBar10oz\"};
	};
	class ItemKeyKit {
		type = \"trade_weapons\";
		buy[] ={1,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};

	class SmokeShell {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class SmokeShellGreen {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class SmokeShellRed {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class 1Rnd_Smoke_M203 {
		type = \"trade_items\";
		buy[] ={4,\"ItemSilverBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};
	class 1Rnd_Smoke_GP25 {
		type = \"trade_items\";
		buy[] ={4,\"ItemSilverBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};

	
	class FoodCanBakedBeans {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanFrankBeans {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanPasta {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanSardines {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanBeef {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanPotatoes {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanGriff {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanBadguy {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanBoneboy {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanCorn {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanCurgon {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanDemon {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanFraggleos {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanHerpy {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanDerpy {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanOrlok {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanPowell {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanTylers {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanUnlabeled {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusUnlabeled {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusStew {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusPork {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusPeas {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusMilk {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCanRusCorn {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodChipsSulahoops {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodChipsMysticales {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodChipsChocolate {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCandyChubby {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCandyAnders {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCandyLegacys {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCakeCremeCakeClean {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodCandyMintception {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodPistachio {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodNutmix {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class FoodMRE {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar10oz\"};
		sell[] ={5,\"ItemSilverBar\"};
	};

	
	class ItemAntibiotic {
		type = \"trade_items\";
		buy[] ={1,\"ItemGoldBar\"};
		sell[] ={2,\"ItemSilverBar10oz\"};
	};
	class ItemBandage {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemAntibacterialWipe {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagONEG {
		type = \"trade_items\";
		buy[] ={4,\"ItemSilverBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};
	class bloodBagANEG {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagAPOS {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagBNEG {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagBPOS {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagABNEG {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagABPOS {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodBagOPOS {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class bloodTester {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class transfusionKit {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class emptyBloodBag {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemEpinephrine {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemHeatPack {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemMorphine {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemPainkiller {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class equip_string {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class equip_gauze {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class equip_gauzepackaged {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class equip_rag {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class equip_herb_box {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};

    class ItemKiloHemp {type = \"trade_items\";buy[] ={3,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};

	class ItemWaterbottleUnfilled {
		type = \"trade_items\";
		buy[] ={3,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemSodaCoke {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemSodaPepsi {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar\"};
		sell[] ={1,\"ItemSilverBar\"};
	};
	class ItemSodaMdew {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class ItemSodaMtngreen {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaR4z0r {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class ItemSodaClays {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaSmasht {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaDrwaste {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaFranka {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaLemonade {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaLirik {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaLvg {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaMzly {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaPeppsy {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaRabbit {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaSacrite {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaRocketFuel {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaGrapeDrink {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSherbet {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class ItemSodaRbull {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class ItemSodaOrangeSherbet {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};

	class FoodDogCooked {type = \"trade_items\";buy[] ={1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class FoodBaconCooked {type = \"trade_items\";buy[] ={1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class FoodGoatCooked {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class FoodMuttonCooked {type = \"trade_items\";buy[] ={3,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class FoodChickenCooked {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
	class FoodBeefCooked {type = \"trade_items\";buy[] ={5,\"ItemGoldBar\"};sell[] ={5,\"ItemGoldBar\"};};
	class FoodRabbitCooked {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={6,\"ItemGoldBar\"};};
	class FishCookedTrout {type = \"trade_items\";buy[] ={5,\"ItemGoldBar\"};sell[] ={5,\"ItemGoldBar\"};};
	class FishCookedSeaBass {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={6,\"ItemGoldBar\"};};
	class FishCookedTuna {type = \"trade_items\";buy[] ={9,\"ItemGoldBar\"};sell[] ={9,\"ItemGoldBar\"};};

	
	class Skin_Rocker2_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorW2_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Functionary1_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Haris_Press_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Priest_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWpink_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWurban_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWcombat_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWdesert_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Survivor2_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Rocker1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Rocker3_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_RU_Policeman_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Pilot_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Rocker4_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorW3_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_INS_Lopotev_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Doctor_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Assistant_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Worker1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Worker3_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_Worker4_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani01_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani03_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani04_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani06_EP1_DZ {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};

class HandChemBlue {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; };
class HandChemGreen {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
class HandChemRed {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};}; 
class HandRoadFlare {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; }; 
class FlareWhite_M203 {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; }; 
class FlareGreen_M203 {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; };
class FlareWhite_GP25 {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; };
class FlareGreen_GP25 {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar\"}; sell[] ={1,\"ItemSilverBar\"}; };

class plot_pole_kit {type = \"trade_items\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={6,\"ItemGoldBar10oz\"};};
class ItemVault {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ItemLockbox {type=\"trade_items\"; buy[] ={6,\"ItemGoldBar10oz\"}; sell[] ={2,\"ItemGoldBar10oz\"}; };
class ItemComboLock {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};}; 
class metal_floor_kit {type = \"trade_items\";buy[] ={9,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class half_cinder_wall_kit {type = \"trade_items\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class full_cinder_wall_kit {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class cinder_door_kit {type = \"trade_items\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class cinder_garage_kit {type = \"trade_items\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class ItemWoodFloor {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodWall {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodWallGarageDoor {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodWallDoor {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodLadder {type = \"trade_items\";buy[] ={3,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodStairs {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemWoodStairsSupport {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class metal_panel_kit {type=\"trade_items\"; buy[] ={9,\"ItemGoldBar\"}; sell[] ={4,\"ItemGoldBar\"}; };
class ItemDesertTent {type=\"trade_items\"; buy[] ={6,\"ItemSilverBar10oz\"}; sell[] ={3,\"ItemSilverBar10oz\"}; }; 
class ItemTent {type=\"trade_items\"; buy[] ={4,\"ItemSilverBar10oz\"}; sell[] ={2,\"ItemSilverBar10oz\"}; }; 
class ItemDomeTent {type=\"trade_items\"; buy[] ={6,\"ItemSilverBar10oz\"}; sell[] ={3,\"ItemSilverBar10oz\"}; }; 
class ItemCorrugated {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class ItemPole {type = \"trade_items\";buy[] ={1,\"ItemSilverBar10oz\"};sell[] ={5,\"ItemSilverBar\"};};
class CinderBlocks {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class MortarBucket {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class ItemSandbag {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
class ItemTankTrap {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
class ItemWire {type = \"trade_items\";buy[] ={6,\"ItemSilverBar\"};sell[] ={3,\"ItemSilverBar\"};};
class ItemLightBulb {type=\"trade_items\"; buy[] ={2,\"ItemSilverBar10oz\"}; sell[] ={1,\"ItemSilverBar10oz\"}; }; 
class ItemGenerator {type=\"trade_items\"; buy[] ={6,\"ItemGoldBar\"}; sell[] ={3,\"ItemGoldBar\"}; };
class ChainSaw {type=\"trade_weapons\"; buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ChainSawB {type=\"trade_weapons\"; buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ChainSawG {type=\"trade_weapons\"; buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ChainSawP {type=\"trade_weapons\"; buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ChainSawR {type=\"trade_weapons\"; buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class ItemMixOil {type = \"trade_items\";buy[] ={8,\"ItemSilverBar\"};sell[] ={4,\"ItemSilverBar\"};};
class equip_brick {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
class equip_duct_tape {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
class equip_rope {type = \"trade_items\";buy[] ={4,\"ItemSilverBar\"};sell[] ={2,\"ItemSilverBar\"};};
class equip_hose {type = \"trade_items\";buy[] ={6,\"ItemSilverBar\"};sell[] ={3,\"ItemSilverBar\"};};
class equip_lever {type = \"trade_items\";buy[] ={6,\"ItemSilverBar\"};sell[] ={3,\"ItemSilverBar\"};};
class equip_nails {type = \"trade_items\";buy[] ={2,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
class equip_metal_sheet {type = \"trade_items\";buy[] ={2,\"ItemSilverBar10oz\"};sell[] ={1,\"ItemSilverBar10oz\"};};
class equip_1inch_metal_pipe {type = \"trade_items\";buy[] ={6,\"ItemSilverBar\"};sell[] ={3,\"ItemSilverBar\"};};
class equip_2inch_metal_pipe {type = \"trade_items\";buy[] ={8,\"ItemSilverBar\"};sell[] ={4,\"ItemSilverBar\"};};

	class Smallboat_1 {
		type = \"trade_any_boat\";
		buy[] ={2,\"ItemGoldBar10oz\"};
		sell[] ={1,\"ItemGoldBar10oz\"};
	};
	class Smallboat_2 {
		type = \"trade_any_boat\";
		buy[] ={2,\"ItemGoldBar10oz\"};
		sell[] ={1,\"ItemGoldBar10oz\"};
	};
	class Zodiac {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class Fishing_Boat {
		type = \"trade_any_boat\";
		buy[] ={4,\"ItemGoldBar10oz\"};
		sell[] ={2,\"ItemGoldBar10oz\"};
	};
	class PBX {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Red {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Yellow {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Green {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Blue {
		type = \"trade_any_boat\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};

	class RHIB {
		type = \"trade_any_boat\";
		buy[] ={4,\"ItemGoldBar10oz\"};
		sell[] ={2,\"ItemGoldBar10oz\"};
	};
class HandGrenade_west {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class HandGrenade_east {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class 1Rnd_HE_M203 {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class 1Rnd_HE_GP25 {type = \"trade_items\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};

	class DZ_Czech_Vest_Pouch {
		type = \"trade_backpacks\";
		buy[] ={4,\"ItemSilverBar\"};
		sell[] ={2,\"ItemSilverBar\"};
	};
	class DZ_Patrol_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={8,\"ItemSilverBar\"};
		sell[] ={4,\"ItemSilverBar\"};
	};
	class DZ_Assault_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={1,\"ItemSilverBar10oz\"};
		sell[] ={5,\"ItemSilverBar\"};
	};
	class DZ_TerminalPack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={2,\"ItemSilverBar10oz\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class DZ_ALICE_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={6,\"ItemSilverBar10oz\"};
		sell[] ={3,\"ItemSilverBar10oz\"};
	};
	class DZ_TK_Assault_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={8,\"ItemSilverBar10oz\"};
		sell[] ={4,\"ItemSilverBar10oz\"};
	};
	class DZ_British_ACU {
		type = \"trade_backpacks\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class DZ_GunBag_EP1 {
		type = \"trade_backpacks\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class DZ_CivilBackpack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={8,\"ItemGoldBar\"};
		sell[] ={4,\"ItemGoldBar\"};
	};
	class DZ_Backpack_EP1 {
		type = \"trade_backpacks\";
		buy[] ={2,\"ItemGoldBar10oz\"};
		sell[] ={1,\"ItemGoldBar10oz\"};
	};
	class DZ_LargeGunBag_EP1 {
		type = \"trade_backpacks\";
		buy[] ={4,\"ItemGoldBar10oz\"};
		sell[] ={2,\"ItemGoldBar10oz\"};
	};
class AN2_DZ {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class AN2_2_DZ {type = \"trade_any_vehicle\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class C130J_US_EP1_DZ {type = \"trade_any_vehicle\";buy[] ={3,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class MV22_DZ {type = \"trade_any_vehicle\";buy[] ={5,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class MV22 {type = \"trade_any_vehicle\";buy[] ={5,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class GNT_C185_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class GNT_C185R_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class GNT_C185C_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};


class An2_2_TK_CIV_EP1 {type = \"trade_any_vehicle\";buy[] ={5,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class GNT_C185U {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};


class Mi17_Civilian_DZ {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class AH6X_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class MH6J_DZ {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class Ka137_PMC {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class CSJ_GyroC {type = \"trade_any_vehicle\";buy[] ={1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar\"};};
class CSJ_GyroCover {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class CSJ_GyroP {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar\"};sell[] ={4,\"ItemGoldBar\"};};
class pook_H13_medevac {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_CDF {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_TAK {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_INS {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_UNO {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_PMC {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_GUE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class pook_H13_medevac_CIV {type = \"trade_any_vehicle\";buy[] ={8,\"ItemGoldBar10oz\"};sell[] ={4,\"ItemGoldBar10oz\"};};
class BAF_Merlin_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class UH60M_MEV_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};

class BAF_LRR_scoped {type=\"trade_weapons\"; buy[] ={3,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; }; 
class BAF_LRR_scoped_W {type=\"trade_weapons\"; buy[] ={3,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; }; 
class KSVK_DZE {type=\"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; };
class M107_DZ {type = \"trade_weapons\"; buy[] ={4,\"ItemBriefcase100oz\"}; sell[] ={2,\"ItemBriefcase100oz\"};};
class Anzio_20_DZ { type = \"trade_weapons\"; buy[] ={6,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"};};
class BAF_AS50_scoped_DZ { type = \"trade_weapons\"; buy[] ={8,\"ItemBriefcase100oz\"}; sell[] ={4,\"ItemBriefcase100oz\"};};
class SCAR_L_STD_EGLM_TWS {type=\"trade_weapons\"; buy[] ={12,\"ItemBriefcase100oz\"}; sell[] ={6,\"ItemBriefcase100oz\"}; };
class SCAR_H_STD_TWS_SD {type=\"trade_weapons\"; buy[] ={12,\"ItemBriefcase100oz\"}; sell[] ={6,\"ItemBriefcase100oz\"}; };
class M110_TWS_EP1 {type=\"trade_weapons\"; buy[] ={14,\"ItemBriefcase100oz\"}; sell[] ={7,\"ItemBriefcase100oz\"}; };
class m107_TWS_EP1 {type = \"trade_weapons\"; buy[] ={18,\"ItemBriefcase100oz\"};    sell[] ={9,\"ItemBriefcase100oz\"};};
class BAF_AS50_TWS {type = \"trade_weapons\";    buy[] ={20,\"ItemBriefcase100oz\"}; sell[] ={10,\"ItemBriefcase100oz\"};};
class AA12_PMC {type=\"trade_weapons\"; buy[] ={4,\"ItemBriefcase100oz\"}; sell[] ={2,\"ItemBriefcase100oz\"}; };
class Mk13_EP1 {type = \"trade_weapons\"; buy[] ={6,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"};};
class M32_EP1 {type = \"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"};};
class M79_EP1 {type = \"trade_weapons\"; buy[] ={6,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"};};
class RPG7V {type = \"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={9,\"ItemGoldBar10oz\"};};
class MAAWS {type = \"trade_weapons\"; buy[] ={-1,\"ItemGoldBar10oz\"}; sell[] ={9,\"ItemGoldBar10oz\"};};


	class 100Rnd_762x51_M240 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 30Rnd_556x45_StanagSD {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class 20Rnd_762x51_B_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_SB_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_FNFAL {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class 20Rnd_762x51_DMR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 5Rnd_86x70_L115A1 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 5Rnd_127x108_KSVK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 10Rnd_127x99_m107 {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class 3rnd_Anzio_20x102mm {type = \"trade_items\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class 5Rnd_127x99_as50 {type = \"trade_items\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
	class 1Rnd_HE_M203 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class 6Rnd_HE_M203 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_74Slug {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_Pellets {type = \"trade_items\";buy[] ={3,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_HE {type = \"trade_items\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
	class PG7V {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class MAAWS_HEAT {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class 2000Rnd_762x51_M134 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 100Rnd_127x99_M2 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 250Rnd_127x99_M3P {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 50Rnd_127x107_DSHKM {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 150Rnd_127x107_DSHKM {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 150Rnd_127x108_KORD {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 50Rnd_127x108_KORD {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 29Rnd_30mm_AGS30 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 400Rnd_30mm_AGS17 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 48Rnd_40mm_MK19 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};

class Pickup_PK_TK_GUE_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Pickup_PK_GUE_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Pickup_PK_INS_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Offroad_DSHKM_Gue_DZE {type = \"trade_any_vehicle\";buy[] ={7,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class HMMWV_M998A2_SOV_DES_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={3,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class LandRover_Special_CZ_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class LandRover_MG_TK_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class BTR40_MG_TK_GUE_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class UAZ_MG_TK_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class GAZ_Vodnik_DZE {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class HMMWV_M1151_M2_CZ_DES_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class ArmoredSUV_PMC_DZE {type = \"trade_any_vehicle\";buy[] ={10,\"ItemBriefcase100oz\"};sell[] ={4,\"ItemBriefcase100oz\"};};
class BRDM2_HQ_TK_GUE_EP1 {type = \"trade_any_vehicle\";buy[] ={14,\"ItemBriefcase100oz\"};sell[] ={7,\"ItemBriefcase100oz\"};};
class M113_TK_EP1 {type = \"trade_any_vehicle\";buy[] ={18,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemBriefcase100oz\"};};

class CH_47F_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class Mi17_DZ {type = \"trade_any_vehicle\";buy[] ={5,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class Mi17_DZE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class MH60S_DZE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class UH60M_EP1_DZE {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"}; };
class UH1H_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class UH1H_DZ {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class UH1Y_DZE {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"}; }; 
class AH6J_EP1_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class pook_H13_gunship {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_CDF {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_UNO {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_PMC {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_GUE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_TAK {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_INS {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_transport {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_CDF {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_UNO {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_PMC {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_GUE {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_TAK {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_INS {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};

class Skin_CZ_Special_Forces_GL_DES_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Drake_Light_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_Sniper_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_FR_OHara_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_FR_Rodriguez_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_CZ_Soldier_Sniper_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Graves_Light_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_Bodyguard_AA12_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Camo1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Rocket_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Sniper1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_TL_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_TK_INS_Soldier_AR_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_TK_GUE_Soldier_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RU_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RU_Soldier_Officer_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RUS_Soldier1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RUS_Commander_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_MVD_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Soldier_2_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Commander_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Soldier_Crew_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_CDF_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};

class PartOreGold {type = \"trade_items\";buy[] ={1,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class PartOreSilver {type = \"trade_items\";buy[] ={1,\"ItemSilverBar\"};sell[] ={1,\"ItemSilverBar\"};};
class ItemRuby {type=\"trade_items\"; buy[] ={1,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; }; 
class ItemCitrine {type=\"trade_items\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={2,\"ItemBriefcase100oz\"}; }; 
class ItemEmerald {type=\"trade_items\"; buy[] ={3,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"}; }; 
class ItemAmethyst {type=\"trade_items\"; buy[] ={4,\"ItemBriefcase100oz\"}; sell[] ={4,\"ItemBriefcase100oz\"}; }; 
class ItemSapphire {type=\"trade_items\"; buy[] ={5,\"ItemBriefcase100oz\"}; sell[] ={5,\"ItemBriefcase100oz\"}; }; 
class ItemObsidian {type=\"trade_items\"; buy[] ={6,\"ItemBriefcase100oz\"}; sell[] ={6,\"ItemBriefcase100oz\"}; }; 
class ItemTopaz {type=\"trade_items\"; buy[] ={7,\"ItemBriefcase100oz\"}; sell[] ={7,\"ItemBriefcase100oz\"}; };

class BAF_LRR_scoped {type=\"trade_weapons\"; buy[] ={3,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; }; 
class BAF_LRR_scoped_W {type=\"trade_weapons\"; buy[] ={3,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; }; 
class KSVK_DZE {type=\"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"}; };
class M107_DZ {type = \"trade_weapons\"; buy[] ={4,\"ItemBriefcase100oz\"}; sell[] ={2,\"ItemBriefcase100oz\"};};
class Anzio_20_DZ { type = \"trade_weapons\"; buy[] ={6,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"};};
class BAF_AS50_scoped_DZ { type = \"trade_weapons\"; buy[] ={8,\"ItemBriefcase100oz\"}; sell[] ={4,\"ItemBriefcase100oz\"};};
class SCAR_L_STD_EGLM_TWS {type=\"trade_weapons\"; buy[] ={12,\"ItemBriefcase100oz\"}; sell[] ={6,\"ItemBriefcase100oz\"}; };
class SCAR_H_STD_TWS_SD {type=\"trade_weapons\"; buy[] ={12,\"ItemBriefcase100oz\"}; sell[] ={6,\"ItemBriefcase100oz\"}; };
class M110_TWS_EP1 {type=\"trade_weapons\"; buy[] ={14,\"ItemBriefcase100oz\"}; sell[] ={7,\"ItemBriefcase100oz\"}; };
class m107_TWS_EP1 {type = \"trade_weapons\"; buy[] ={18,\"ItemBriefcase100oz\"};    sell[] ={9,\"ItemBriefcase100oz\"};};
class BAF_AS50_TWS {type = \"trade_weapons\";    buy[] ={20,\"ItemBriefcase100oz\"}; sell[] ={10,\"ItemBriefcase100oz\"};};
class AA12_PMC {type=\"trade_weapons\"; buy[] ={4,\"ItemBriefcase100oz\"}; sell[] ={2,\"ItemBriefcase100oz\"}; };
class Mk13_EP1 {type = \"trade_weapons\"; buy[] ={6,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"};};
class M32_EP1 {type = \"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={1,\"ItemBriefcase100oz\"};};
class M79_EP1 {type = \"trade_weapons\"; buy[] ={6,\"ItemGoldBar10oz\"}; sell[] ={3,\"ItemGoldBar10oz\"};};
class RPG7V {type = \"trade_weapons\"; buy[] ={2,\"ItemBriefcase100oz\"}; sell[] ={9,\"ItemGoldBar10oz\"};};
class MAAWS {type = \"trade_weapons\"; buy[] ={-1,\"ItemGoldBar10oz\"}; sell[] ={9,\"ItemGoldBar10oz\"};};

	class 100Rnd_762x51_M240 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
	class 30Rnd_556x45_StanagSD {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class 20Rnd_762x51_B_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_SB_SCAR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 20Rnd_762x51_FNFAL {type = \"trade_items\";buy[] ={4,\"ItemSilverBar10oz\"};sell[] ={2,\"ItemSilverBar10oz\"};};
	class 20Rnd_762x51_DMR {type = \"trade_items\";buy[] ={6,\"ItemGoldBar\"};sell[] ={3,\"ItemGoldBar\"};};
	class 5Rnd_86x70_L115A1 {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 5Rnd_127x108_KSVK {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 10Rnd_127x99_m107 {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class 3rnd_Anzio_20x102mm {type = \"trade_items\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class 5Rnd_127x99_as50 {type = \"trade_items\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
	class 1Rnd_HE_M203 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar\"};sell[] ={2,\"ItemGoldBar\"};};
	class 6Rnd_HE_M203 {type = \"trade_items\";buy[] ={4,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_74Slug {type = \"trade_items\";buy[] ={2,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_Pellets {type = \"trade_items\";buy[] ={3,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 20Rnd_B_AA12_HE {type = \"trade_items\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
	class PG7V {type = \"trade_items\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class MAAWS_HEAT {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
	class 2000Rnd_762x51_M134 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 100Rnd_127x99_M2 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 250Rnd_127x99_M3P {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 50Rnd_127x107_DSHKM {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 150Rnd_127x107_DSHKM {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 150Rnd_127x108_KORD {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 50Rnd_127x108_KORD {type = \"trade_items\";buy[] ={-1,\"ItemGoldBar10oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 29Rnd_30mm_AGS30 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 400Rnd_30mm_AGS17 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};
	class 48Rnd_40mm_MK19 {type = \"trade_items\";buy[] ={-1,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemGoldBar10oz\"};};


class Pickup_PK_TK_GUE_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Pickup_PK_GUE_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Pickup_PK_INS_DZE {type = \"trade_any_vehicle\";buy[] ={5,\"ItemGoldBar10oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class Offroad_DSHKM_Gue_DZE {type = \"trade_any_vehicle\";buy[] ={7,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};
class HMMWV_M998A2_SOV_DES_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={3,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class LandRover_Special_CZ_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class LandRover_MG_TK_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class BTR40_MG_TK_GUE_EP1 {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class UAZ_MG_TK_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemGoldBar10oz\"};};
class GAZ_Vodnik_DZE {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class HMMWV_M1151_M2_CZ_DES_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={8,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class ArmoredSUV_PMC_DZE {type = \"trade_any_vehicle\";buy[] ={10,\"ItemBriefcase100oz\"};sell[] ={4,\"ItemBriefcase100oz\"};};
class BRDM2_HQ_TK_GUE_EP1 {type = \"trade_any_vehicle\";buy[] ={14,\"ItemBriefcase100oz\"};sell[] ={7,\"ItemBriefcase100oz\"};};
class M113_TK_EP1 {type = \"trade_any_vehicle\";buy[] ={18,\"ItemBriefcase100oz\"};sell[] ={9,\"ItemBriefcase100oz\"};};

class CH_47F_EP1_DZE {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class Mi17_DZ {type = \"trade_any_vehicle\";buy[] ={5,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class Mi17_DZE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class MH60S_DZE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemBriefcase100oz\"};};
class UH60M_EP1_DZE {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"}; };
class UH1H_DZE {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class UH1H_DZ {type = \"trade_any_vehicle\";buy[] ={2,\"ItemBriefcase100oz\"};sell[] ={1,\"ItemBriefcase100oz\"};};
class UH1Y_DZE {type=\"trade_any_vehicle\"; buy[] ={7,\"ItemBriefcase100oz\"}; sell[] ={3,\"ItemBriefcase100oz\"}; }; 
class AH6J_EP1_DZ {type = \"trade_any_vehicle\";buy[] ={6,\"ItemBriefcase100oz\"};sell[] ={3,\"ItemBriefcase100oz\"};};
class pook_H13_gunship {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_CDF {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_UNO {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_PMC {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_GUE {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_TAK {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_gunship_INS {type = \"trade_any_vehicle\";buy[] ={4,\"ItemBriefcase100oz\"};sell[] ={2,\"ItemGoldBar10oz\"};};
class pook_H13_transport {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_CDF {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_UNO {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_PMC {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_GUE {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_TAK {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};
class pook_H13_transport_INS {type = \"trade_any_vehicle\";buy[] ={1,\"ItemBriefcase100oz\"};sell[] ={5,\"ItemGoldBar10oz\"};};

class Skin_CZ_Special_Forces_GL_DES_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Drake_Light_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_Sniper_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_FR_OHara_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_FR_Rodriguez_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_CZ_Soldier_Sniper_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Graves_Light_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_Bodyguard_AA12_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Camo1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Rocket_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Sniper1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Soldier_TL_PMC_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_TK_INS_Soldier_AR_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_TK_GUE_Soldier_EP1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RU_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RU_Soldier_Officer_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RUS_Soldier1_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_RUS_Commander_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_MVD_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Soldier_2_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Commander_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_Ins_Soldier_Crew_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};
class Skin_CDF_Soldier_DZ {type = \"trade_items\";buy[] ={2,\"ItemGoldBar\"};sell[] ={1,\"ItemGoldBar\"};};

	class Attachment_BELT {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_SA58RIS {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_Ghillie {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Attachment_FL_Pist {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Attachment_FL {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};
	class Attachment_CCO {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_Holo {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_Kobra {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_SCOPED {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class Attachment_ACOG {
		type = \"trade_items\";
		buy[] ={8,\"ItemGoldBar\"};
		sell[] ={4,\"ItemGoldBar\"};
	};	
	class Attachment_PSO1 {
		type = \"trade_items\";
		buy[] ={8,\"ItemGoldBar\"};
		sell[] ={4,\"ItemGoldBar\"};
	};
	class Attachment_Sup9 {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class Attachment_Sup545 {
		type = \"trade_items\";
		buy[] ={6,\"ItemGoldBar\"};
		sell[] ={3,\"ItemGoldBar\"};
	};
	class Attachment_Sup556 {
		type = \"trade_items\";
		buy[] ={8,\"ItemGoldBar\"};
		sell[] ={4,\"ItemGoldBar\"};
	};
	class Attachment_GP25 {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};	
	class Attachment_M203 {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};

	class bulk_17Rnd_9x19_glock17 {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class bulk_15Rnd_9x19_M9SD {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class bulk_30Rnd_9x19_MP5SD {
		type = \"trade_items\";
		buy[] ={3,\"ItemGoldBar\"};
		sell[] ={3,\"ItemSilverBar10oz\"};
	};
	class bulk_30Rnd_556x45_StanagSD {
		type = \"trade_items\";
		buy[] ={4,\"ItemGoldBar\"};
		sell[] ={4,\"ItemSilverBar10oz\"};
	};
	class bulk_ItemSandbag {
		type = \"trade_items\";
		buy[] ={3,\"ItemGoldBar10oz\"};
		sell[] ={3,\"ItemGoldBar10oz\"};
	};
	class bulk_ItemTankTrap {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={2,\"ItemGoldBar\"};
	};
	class bulk_ItemWire {
		type = \"trade_items\";
		buy[] ={5,\"ItemSilverBar10oz\"};
		sell[] ={5,\"ItemSilverBar10oz\"};
	};
	class bulk_PartGeneric {
		type = \"trade_items\";
		buy[] ={8,\"ItemGoldBar\"};
		sell[] ={8,\"ItemGoldBar\"};
	};
	class PartPlywoodPack {
		type = \"trade_items\";
		buy[] ={2,\"ItemSilverBar10oz\"};
		sell[] ={1,\"ItemSilverBar10oz\"};
	};
	class PartPlankPack {
		type = \"trade_items\";
		buy[] ={1,\"ItemSilverBar10oz\"};
		sell[] ={5,\"ItemSilverBar\"};
	};
	class CinderBlocks {
		type = \"trade_items\";
		buy[] ={1,\"ItemGoldBar10oz\"};
		sell[] ={5,\"ItemGoldBar\"};
	};
	class MortarBucket {
		type = \"trade_items\";
		buy[] ={1,\"ItemGoldBar10oz\"};
		sell[] ={5,\"ItemGoldBar\"};
	};
	class ItemFuelBarrelEmpty {
		type = \"trade_items\";
		buy[] ={1,\"ItemGoldBar\"};
		sell[] ={5,\"ItemSilverBar10oz\"};
	};
	class ItemFuelBarrel {
		type = \"trade_items\";
		buy[] ={2,\"ItemGoldBar\"};
		sell[] ={1,\"ItemGoldBar\"};
	};


";
    }
}
