<?php

namespace App\Controller;

use App\Entity\Eleve;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Eleve::class);

        $etudiants= $repository->findAll();
        return $this->render('etudiant/lister.html.twig', [
            'pEtudiants' => $etudiants,]);

    }
    #[Route('/etudiant/{id}', name: 'detailEtudiant')]
    public function detailEtudiant(int $id,ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Eleve::class);

        $etudiant= $repository->find($id);
        return $this->render('etudiant/index.html.twig', [
            'etudiant' => $etudiant,]);

    }

}
