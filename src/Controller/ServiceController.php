<?php

namespace App\Controller;

use App\Entity\Service;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/api/service', name: 'app_service_')]
class ServiceController extends AbstractController
{
    public function __construct(private EntityManagerInterface $manager, private ServiceRepository $repository)
    {
    }



    #[Route('/new', name: 'new', methods:'POST')]
    public function new(): Response{
        
        $service = new Service();
        $service->setNom('Train');
        $service->setDescription('test');
        $service->setHeureOuverture('12:00');
        $service->setHeureFermeture('12:00');

        $this->manager->persist($service);

        $this->manager->flush();

        return $this->json(
            ['message' => "Restaurant resource created with {$service->getId()} id"],
            Response::HTTP_CREATED,
        );


   }
   #[Route('/show', name: 'show', methods:'PUT')]
   public function edit(): Response{

   }

   #[Route('/delete', name: 'delete', methods:'DELETE')]
   public function delete(): Response{

   }
   
}
