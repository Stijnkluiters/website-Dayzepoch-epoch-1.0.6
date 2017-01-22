<?php

namespace AppBundle\Controller\back_end;

use AppBundle\Entity\Product;
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
        $string ="
	class PartGeneric {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {6,\"ItemSilverBar\"};
	};
	class PartWheel {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};
	class PartGlass {
		type = \"trade_items\";
		buy[] = {1,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class PartEngine {
		type = \"trade_items\";
		buy[] = {5,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class PartVRotor {
		type = \"trade_items\";
		buy[] = {5,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class PartFueltank {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {5,\"ItemSilverBar\"};
	};
	class ItemFuelcan {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemFuelcanEmpty {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemJerrycan {
		type = \"trade_items\";
		buy[] = {4,\"ItemSilverBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};
	class ItemJerrycanEmpty {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};


	class ItemWatch {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemCompass {
		type = \"trade_weapons\";
		buy[] = {6,\"ItemSilverBar\"};
		sell[] = {3,\"ItemSilverBar\"};
	};
	class ItemMap {
		type = \"trade_weapons\";
		buy[] = {6,\"ItemSilverBar\"};
		sell[] = {3,\"ItemSilverBar\"};
	};
	class ItemGPS {
		type = \"trade_weapons\";
		buy[] = {1,\"ItemGoldBar\"}; // Sell only
		sell[] = {4,\"ItemSilverBar10oz\"};
	};
	class Binocular {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class Binocular_Vector {
		type = \"trade_weapons\";
		buy[] = {1,\"ItemGoldBar\"}; // Sell only
		sell[] = {4,\"ItemSilverBar10oz\"};
	};
	class NVGoggles {
		type = \"trade_weapons\";
		buy[] = {1,\"ItemGoldBar\"}; // Sell only
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class ItemFlashlight {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemFlashlightRed {
		type = \"trade_weapons\";
		buy[] = {1,\"ItemSilverBar10oz\"};
		sell[] = {5,\"ItemSilverBar\"};
	};
	class ItemMatchbox {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemEtool {
		type = \"trade_weapons\";
		buy[] = {9,\"ItemSilverBar10oz\"};
		sell[] = {6,\"ItemSilverBar10oz\"};
	};
	class ItemHatchet {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemKnife {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemToolbox {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class ItemCrowbar {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemMachete {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemFishingPole {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar10oz\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class ItemPickaxe {
		type = \"trade_weapons\";
		buy[] = {2,\"ItemSilverBar10oz\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class ItemSledge {
		type = \"trade_weapons\";
		buy[] = {8,\"ItemSilverBar10oz\"};
		sell[] = {4,\"ItemSilverBar10oz\"};
	};
	class ItemKeyKit {
		type = \"trade_weapons\";
		buy[] = {1,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};

	
	class SmokeShell {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class SmokeShellGreen {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class SmokeShellRed {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class 1Rnd_Smoke_M203 {
		type = \"trade_items\";
		buy[] = {4,\"ItemSilverBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};
	class 1Rnd_Smoke_GP25 {
		type = \"trade_items\";
		buy[] = {4,\"ItemSilverBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};

	class FoodCanBakedBeans {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanFrankBeans {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanPasta {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanSardines {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanBeef {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanPotatoes {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanGriff {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanBadguy {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanBoneboy {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanCorn {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanCurgon {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanDemon {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanFraggleos {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanHerpy {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanDerpy {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanOrlok {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanPowell {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanTylers {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanUnlabeled {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusUnlabeled {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusStew {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusPork {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusPeas {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusMilk {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCanRusCorn {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodChipsSulahoops {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodChipsMysticales {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodChipsChocolate {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCandyChubby {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCandyAnders {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCandyLegacys {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCakeCremeCakeClean {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodCandyMintception {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodPistachio {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodNutmix {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class FoodMRE {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar10oz\"};
		sell[] = {5,\"ItemSilverBar\"};
	};
	class ItemAntibiotic {
		type = \"trade_items\";
		buy[] = {1,\"ItemGoldBar\"};
		sell[] = {2,\"ItemSilverBar10oz\"};
	};
	class ItemBandage {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemAntibacterialWipe {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagONEG {
		type = \"trade_items\";
		buy[] = {4,\"ItemSilverBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};
	class bloodBagANEG {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagAPOS {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagBNEG {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagBPOS {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagABNEG {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagABPOS {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodBagOPOS {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class bloodTester {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class transfusionKit {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class emptyBloodBag {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemEpinephrine {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemHeatPack {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemMorphine {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemPainkiller {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class equip_string {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class equip_gauze {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class equip_gauzepackaged {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class equip_rag {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class equip_herb_box {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};

};

class ItemKiloHemp {type = \"trade_items\";buy[] ={3,\"ItemGoldBar10oz\"};sell[] ={3,\"ItemGoldBar10oz\"};};

	
	class ItemWaterbottleUnfilled {
		type = \"trade_items\";
		buy[] = {3,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemSodaCoke {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemSodaPepsi {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar\"};
		sell[] = {1,\"ItemSilverBar\"};
	};
	class ItemSodaMdew {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class ItemSodaMtngreen {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaR4z0r {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class ItemSodaClays {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaSmasht {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaDrwaste {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaFranka {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaLemonade {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaLirik {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaLvg {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaMzly {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaPeppsy {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaRabbit {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaSacrite {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaRocketFuel {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaGrapeDrink {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSherbet {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class ItemSodaRbull {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class ItemSodaOrangeSherbet {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	
	class Skin_Rocker2_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorW2_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Functionary1_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Haris_Press_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Priest_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWpink_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWurban_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWcombat_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorWdesert_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Survivor2_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Rocker1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Rocker3_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_RU_Policeman_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Pilot_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Rocker4_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_SurvivorW3_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_INS_Lopotev_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	//new Epoch 1.06
	class Skin_Doctor_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Assistant_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Worker1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Worker3_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_Worker4_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani01_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani03_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani04_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Skin_TK_CIV_Takistani06_EP1_DZ {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
class Smallboat_1 {
		type = \"trade_any_boat\";
		buy[] = {2,\"ItemGoldBar10oz\"};
		sell[] = {1,\"ItemGoldBar10oz\"};
	};
	class Smallboat_2 {
		type = \"trade_any_boat\";
		buy[] = {2,\"ItemGoldBar10oz\"};
		sell[] = {1,\"ItemGoldBar10oz\"};
	};
	class Zodiac {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class Fishing_Boat {
		type = \"trade_any_boat\";
		buy[] = {4,\"ItemGoldBar10oz\"};
		sell[] = {2,\"ItemGoldBar10oz\"};
	};
	class PBX {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Red {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Yellow {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Green {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class JetSkiYanahui_Case_Blue {
		type = \"trade_any_boat\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
};
	class RHIB {
		type = \"trade_any_boat\";
		buy[] = {4,\"ItemGoldBar10oz\"};
		sell[] = {2,\"ItemGoldBar10oz\"};
	};
};
class DZ_Czech_Vest_Pouch {
		type = \"trade_backpacks\";
		buy[] = {4,\"ItemSilverBar\"};
		sell[] = {2,\"ItemSilverBar\"};
	};
	class DZ_Patrol_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {8,\"ItemSilverBar\"};
		sell[] = {4,\"ItemSilverBar\"};
	};
	class DZ_Assault_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {1,\"ItemSilverBar10oz\"};
		sell[] = {5,\"ItemSilverBar\"};
	};
	class DZ_TerminalPack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {2,\"ItemSilverBar10oz\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class DZ_ALICE_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {6,\"ItemSilverBar10oz\"};
		sell[] = {3,\"ItemSilverBar10oz\"};
	};
	class DZ_TK_Assault_Pack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {8,\"ItemSilverBar10oz\"};
		sell[] = {4,\"ItemSilverBar10oz\"};
	};
	class DZ_British_ACU {
		type = \"trade_backpacks\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class DZ_GunBag_EP1 {
		type = \"trade_backpacks\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class DZ_CivilBackpack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {8,\"ItemGoldBar\"};
		sell[] = {4,\"ItemGoldBar\"};
	};
	class DZ_Backpack_EP1 {
		type = \"trade_backpacks\";
		buy[] = {2,\"ItemGoldBar10oz\"};
		sell[] = {1,\"ItemGoldBar10oz\"};
	};
	class DZ_LargeGunBag_EP1 {
		type = \"trade_backpacks\";
		buy[] = {4,\"ItemGoldBar10oz\"};
		sell[] = {2,\"ItemGoldBar10oz\"};
	};
	
		class Attachment_BELT {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_SA58RIS {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_Ghillie {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Attachment_FL_Pist {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Attachment_FL {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};
	class Attachment_CCO {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_Holo {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_Kobra {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_SCOPED {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class Attachment_ACOG {
		type = \"trade_items\";
		buy[] = {8,\"ItemGoldBar\"};
		sell[] = {4,\"ItemGoldBar\"};
	};	
	class Attachment_PSO1 {
		type = \"trade_items\";
		buy[] = {8,\"ItemGoldBar\"};
		sell[] = {4,\"ItemGoldBar\"};
	};
	class Attachment_Sup9 {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class Attachment_Sup545 {
		type = \"trade_items\";
		buy[] = {6,\"ItemGoldBar\"};
		sell[] = {3,\"ItemGoldBar\"};
	};
	class Attachment_Sup556 {
		type = \"trade_items\";
		buy[] = {8,\"ItemGoldBar\"};
		sell[] = {4,\"ItemGoldBar\"};
	};
	class Attachment_GP25 {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};	
	class Attachment_M203 {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};

	class bulk_17Rnd_9x19_glock17 {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class bulk_15Rnd_9x19_M9SD {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class bulk_30Rnd_9x19_MP5SD {
		type = \"trade_items\";
		buy[] = {3,\"ItemGoldBar\"};
		sell[] = {3,\"ItemSilverBar10oz\"};
	};
	class bulk_30Rnd_556x45_StanagSD {
		type = \"trade_items\";
		buy[] = {4,\"ItemGoldBar\"};
		sell[] = {4,\"ItemSilverBar10oz\"};
	};
	class bulk_ItemSandbag {
		type = \"trade_items\";
		buy[] = {3,\"ItemGoldBar10oz\"};
		sell[] = {3,\"ItemGoldBar10oz\"};
	};
	class bulk_ItemTankTrap {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {2,\"ItemGoldBar\"};
	};
	class bulk_ItemWire {
		type = \"trade_items\";
		buy[] = {5,\"ItemSilverBar10oz\"};
		sell[] = {5,\"ItemSilverBar10oz\"};
	};
	class bulk_PartGeneric {
		type = \"trade_items\";
		buy[] = {8,\"ItemGoldBar\"};
		sell[] = {8,\"ItemGoldBar\"};
	};
	class PartPlywoodPack {
		type = \"trade_items\";
		buy[] = {2,\"ItemSilverBar10oz\"};
		sell[] = {1,\"ItemSilverBar10oz\"};
	};
	class PartPlankPack {
		type = \"trade_items\";
		buy[] = {1,\"ItemSilverBar10oz\"};
		sell[] = {5,\"ItemSilverBar\"};
	};
	class CinderBlocks {
		type = \"trade_items\";
		buy[] = {1,\"ItemGoldBar10oz\"};
		sell[] = {5,\"ItemGoldBar\"};
	};
	class MortarBucket {
		type = \"trade_items\";
		buy[] = {1,\"ItemGoldBar10oz\"};
		sell[] = {5,\"ItemGoldBar\"};
	};
	class ItemFuelBarrelEmpty {
		type = \"trade_items\";
		buy[] = {1,\"ItemGoldBar\"};
		sell[] = {5,\"ItemSilverBar10oz\"};
	};
	class ItemFuelBarrel {
		type = \"trade_items\";
		buy[] = {2,\"ItemGoldBar\"};
		sell[] = {1,\"ItemGoldBar\"};
	};


";
        $array = explode('class',trim($string));
        $arraymapped = array_map('trim',$array);
        foreach ($arraymapped as $value) {
            $haystack = substr($value, 0, strpos($value, ' '));



            if (strpos($value, $haystack) !== false) {
                $values[] = explode(';',str_replace($haystack,'',$value));
                foreach($values as $search) {

                    foreach ($search as $value2) {
                        // buy
                        if (strpos($value2, 'buy') !== false) {
                            if(!isset($buy)) {
                                if (strpos($value2, 'ItemGoldBar') !== false) {
                                    $buy['ItemGoldBar'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);

                                }
                                if (strpos($value2, 'ItemGoldBar10oz') !== false) {
                                    $buy['ItemGoldBar10oz'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                                if (strpos($value2, 'ItemBriefcase100oz') !== false) {
                                    $buy['ItemBriefcase100oz'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                                if (strpos($value2, 'ItemSilverBar') !== false) {
                                    $buy['ItemSilverBar'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                            }
                        }
                        //sell

                        if (strpos($value2, 'sell') !== false) {
                            if(!isset($sell)) {
                                if (strpos($value2, 'ItemGoldBar') !== false) {
                                    $sell['ItemGoldBar'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                                if (strpos($value2, 'ItemGoldBar10oz') !== false) {
                                    $sell['ItemGoldBar10oz'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                                if (strpos($value2, 'ItemBriefcase100oz') !== false) {
                                    $sell['ItemBriefcase100oz'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                                if (strpos($value2, 'ItemSilverBar') !== false) {
                                    $sell['ItemSilverBar'] = filter_var($value2, FILTER_SANITIZE_NUMBER_INT);
                                }
                            }
                        }
                        //type
                        if (strpos($value2, 'type') !== false) {
                            if (strpos($value2, 'trade_any_vehicle') !== false) {
                                $type = 'trade_any_vehicle';
                            }
                            if (strpos($value2, 'trade_weapons') !== false) {
                                $type = 'trade_weapons';
                            }
                            if (strpos($value2, 'trade_items') !== false) {
                                $type = 'trade_items';
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

                }
                $products[$haystack] = [
                    'type' => $type,
                    'buy'  => $buy,
                    'sell' => $sell,
                ];



                $sell = null;
                $buy = null;
                $type = null;
            }
        }
        foreach($products as $productkey => $product) {
            $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
            $dbproduct = $repository->findBy(['name' => $productkey]);

            if(count($dbproduct) == 0) {
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

        $news = new News();

        $form = $this->createForm(NewsType::class,$news);
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
