<?php

namespace App\Controller;

use App\Entity\Module;
use App\Entity\WorkingHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $modules = $em->getRepository(Module::class)->findAll();
        $workHistories = $em->getRepository(WorkingHistory::class)->findAll();

        return $this->render('home/index.html.twig',
            ['modules' => $modules, 'workHistories' => $workHistories]);
    }

    #[Route('/add_module', name: 'add_module')]
    public function addModule(EntityManagerInterface $em, Request $request): JsonResponse
    {
        $name = $request->request->get('name');

        $module = new Module();
        $module->setName($name);
        $module->setStatus(true);
        $module->setActiveDate(new \DateTime());
        $module->setAddedDate(new \DateTime());

        $workHistory = new WorkingHistory();
        $workHistory->setModuleId($module);
        $workHistory->setStatus(true);
        $workHistory->setDate(new \DateTime());


        $em->persist($module);
        $em->persist($workHistory);
        $em->flush();

        return $this->json($module);
    }

    #[Route('/delete_module', name: 'delete_module')]
    public function deleteModule(EntityManagerInterface $em, Request $request): Response
    {
        $id = $request->request->get('id');

        $module = $em->getRepository(Module::class)->findOneBy(['id' => $id]);

        $em->remove($module);
        $em->flush();

        return new Response('success');
    }
}
