<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\AnalyseFile;
use App\Form\AnalyseFileType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Request $request, FileUploader $fileUploader, EntityManagerInterface $entityManager): Response
    {
        $analyseFile = new AnalyseFile();
        $uploadForm = $this->createForm(AnalyseFileType::class, $analyseFile);
        $uploadForm->handleRequest($request);

        if ($uploadForm->isSubmitted() && $uploadForm->isValid()) { $analyseFileUpload = $uploadForm->get('analyse_file')->getData();

            if ($analyseFileUpload) {$analyseFileName = $fileUploader->upload($analyseFileUpload);
                $analyseFile->setFileName($analyseFileName);


                $entityManager->persist($analyseFile);
                $entityManager->flush();


                return $this->redirectToRoute('app_analysis', ['id' => $analyseFile->getId()]);
            }


        }

        return $this->render('index/index.html.twig', [
            'upload_form' => $uploadForm,
        ]);
    }
}
