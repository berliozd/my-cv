<?php

namespace App\Controller;

use App\Repository\WorkExperienceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\WorkExperience;

class CvController extends AbstractController
{
    public function content()
    {
        $workExperiences = $this->getDoctrine()
            ->getRepository(WorkExperience::class)->findAll();

        return $this->render('cv/content.html.twig', [
            'workExperiences' => $workExperiences,
        ]);
    }
}
