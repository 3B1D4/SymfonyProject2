<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanFeature;
use App\Repository\PricingPlanFeatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\Framework\Assets\PackageConfig;
use App\Repository\PricingPlanRepository;
class PricingController extends AbstractController
{
    #[Route('/pricing', name: 'pricing')]
   
    
    private $pricingPlanRepository;

    public function __construct(PricingPlanRepository $pricingPlanRepository)
    {
        $this->pricingPlanRepository = $pricingPlanRepository;
    }
    public function index(): Response
    {
        $pricingPlans = $this->pricingPlanRepository->findAll();
        
        return $this->render('pricing/index.html.twig', [
            'pricing_plans' => $pricingPlans,
        ]);
    }
    /*public function index(): Response
    {
        
        $pricingPlans = $this->getDoctrine()
            ->getRepository(PricingPlanRepository::class)
            ->findBy([], ['id' => 'asc']);
        $features = $this->getDoctrine()
            ->getRepository(PricingPlanFeatureRepository::class)
            ->findAll();

        return $this->render('pricing/index.html.twig', [
            'pricing_plans' => $pricingPlans,
            'features' => $features,
        ]);
    }*/
}