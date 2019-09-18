<?php

namespace App\Controller;

use App\Entity\WorkExperience;
use App\Entity\WorkExperienceDetail;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class WorkExperienceController extends AbstractController
{
    /**
     * @Route("/work/experience", name="work_experience")
     */
    public function index()
    {
        return $this->render('work_experience/index.html.twig', [
            'controller_name' => 'WorkExperienceController',
        ]);
    }

    private $workExperiences = [
        [
            'context' => 'Freelancing - Addeos (Client : PROXISERVE)',
            'start_date' => '2018/05/01',
            'title' => 'Expert magento',
            'details' => [
                [
                    'Evolution de la plateforme e-commerce www.proxiserve.fr/monchauffagisteprive, www.proxiserve.fr/moninstallateurdeborne 
                <ul><li>Mise en place de nouvelles catégories de produits « radiateurs / sèche-serviettes »</li>
                <li>Mise en place du nouveau site « mon installateur de borne »</li>
                <li>Evolution du parcours « configurateur »</li>
                <li>Evolution du parcours de prise de RDV (Lead)</li>
                <li>Evolution du module agence</li>
                <li>Evolution du parcours d’aide au choix</li>
                <li>Refactoring et nettoyage de code</li></ul>',
                    'Git, Magento CE 1.9.4, PHP 7, MySQL, Docker'
                ],
                [
                    'Evolution des sites www.proxiserve.fr et www.easy-entretien.com
                <ul><li>Formulaire de contact avancé avec gestion en back office</li>
                <li>Formulaire de saisie des index de comptage avec gestion en back office</li>
                <li>Evolution du cobranding easy-entretien</li>
                <li>Réorganisation du contenu CMS</li></ul>',
                    'Git, Magento 2.1, PHP 7, MySQL, Docker'
                ]
            ]
        ], [
            'context' => 'Kaliop Digital Commerce (agence soon)',
            'start_date' => '2016/11/01',
            'end_date' => '2018/05/01',
            'title' => 'Lead développeur',
            'details' => [['Encadrement d\'une équipe de 2 développeurs : estimation, planification, code review, développement magento 1 et 2, déploiement', 'Git, Vagrant, Apache, Nginx, Bitbucket, Magento 1 (différentes versions), Magento 2, PhpStorm, PHP (5 et 7), MySQL, magento cloud']],
        ], [
            'context' => 'Kaliop Digital Commerce (agence soon)',
            'start_date' => '2016/07/01',
            'end_date' => '2016/11/01',
            'title' => 'Développeur Magento',
            'details' => [['Développement magento 1 de nouveaux projets (le temps des cerises, jb martin), maintenance de projets existants', 'Git, Vagrant, Magento 1 (différentes versions), PhpStorm, PHP (5 et 7), MySQL']],
        ], [
            'context' => 'Freelancing (Client : DOCAPOST)',
            'start_date' => '2014/09/01',
            'end_date' => '2016/07/01',
            'title' => 'Développeur full stack',
            'details' => [
                ['Projet Renault Arc : plateforme de demande de service de reprographie<br/>Développement de modules spécifiques Magento (solution de devis, checkout)', 'VM Linux, Magento CE 1.9, PHP, MySQL'],
                ['Projet Le hub numérique de La Poste : plateforme d\'interconnexion et de gestion d\'objets connectés<br/>Développement sur la « brique » portail magento', 'Git, VM, Magento CE 1.9.2.2, PHP, MySQL, JAVA, HTML5, CSS3, Gulp, sass, Backbone, Marionette, Cassandra, Puppet']
            ],
        ], [
            'context' => 'Freelancing (Client : EXPOGRAPH)',
            'start_date' => '2014/01/01',
            'end_date' => '2014/07/01',
            'title' => 'Développeur / Intégrateur de solution (temps partagé)',
            'details' => [['Migration de la boutique www.expograph.com vers Magento CE 1.9 (depuis 1.4)', 'Git, Magento CE 1.9, PHP 5.4, MySQL']],
        ], [
            'context' => 'Freelancing (Client : O.R.D.B)',
            'start_date' => '2010/01/01',
            'end_date' => '2012/06/01',
            'title' => 'Développeur (temps partagé)',
            'details' => [['Développement d\'un site communautaire www.cherbouquin.fr', 'Zend, PHP, Wordpress, PhpStorm, HTML, CSS, Javascript/jQuery, Facebook Connect, Amazon Webservices']],
        ], [
            'context' => 'Freeelancing (Client : bohemianchic)',
            'start_date' => '2010/07/01',
            'end_date' => '2010/10/01',
            'title' => 'Développeur / Intégrateur de solution (temps partagé)',
            'details' => [['Mise en place de la boutique www.bohemianchic.fr', 'PHP, Magento CE 1.4, NetBeans, MySQL, HTML, CSS, JavaScript']],
        ], [
            'context' => 'Freelancing (Client : NGTravel)',
            'start_date' => '2009/10/01',
            'end_date' => '2014/08/01',
            'title' => 'Développeur full stack (temps partagé)',
            'details' => [
                ['Développement du site www.directours.com', 'Eclipse (Spring Tool Suite), Java/Spring, MySQL, JavaScript, JQuery'],
                ['Refonte du site www.plusvoyages.com', 'Wordpress, PHP , HTML, CSS'],
                ['Développement de module sur la plateforme DotNetNuke', 'VB.Net/DotNetNuke, Visual Studio, HTML, CSS, JavaScrip, jQuery'],
                ['Développement d\'une plateforme de réservation de voyage en ASP .Net', 'ASP .Net / VB .Net, Visual Studio, HTML, CSS, JavaScript, jQuery']
            ],
        ], [
            'context' => 'Expedia France',
            'start_date' => '2007/10/01',
            'end_date' => '2009/08/01',
            'title' => 'Ingénieur de développement',
            'details' => [['Optimisations et développements de tous les sites expedia européens, documentations de conception, guides utilisateurs, conduite de revue de code, support', 'Visual Studio 2005, C#']],
        ], [
            'context' => 'Cervocôm',
            'start_date' => '2002/01/01',
            'end_date' => '2007/09/01',
            'title' => 'Analyste programmeur',
            'details' => [['Participation au développement d\'une application web e-commerce en ASP, webservice en VB.NET 1.0, support et documentation', 'Visual Interdev, Microsoft ASP, HTML, CSS, JavaScript, Visual Studio 2003, VB.Net']],
        ]
    ];

    /**
     * @Route("/work/experience", name="work_experience")
     */
    public function createProduct(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($this->workExperiences as $workExperienceData) {

            $workExperience = new WorkExperience();
            $workExperience->setContext($workExperienceData['context']);
            $workExperience->setStartDate(new DateTime($workExperienceData['start_date']));
            if (isset($workExperienceData['end_date'])) {
                $workExperience->setStartDate(new DateTime($workExperienceData['end_date']));
            }
            $workExperience->setTitle($workExperienceData['title']);

            foreach ($workExperienceData['details'] as $workExperienceDetailData) {
                $workExperienceDetail = new WorkExperienceDetail();
                $workExperienceDetail->setDetail($workExperienceDetailData[0]);
                $workExperienceDetail->setTechnicalEnvironment($workExperienceDetailData[1]);
                $workExperience->addWorkExperienceDetail($workExperienceDetail);
                $entityManager->persist($workExperienceDetail);
            }

            $entityManager->persist($workExperience);
        }

        $entityManager->flush();

        return new Response('Saved new experiences');
    }
}
