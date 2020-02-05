<?php

namespace App\Controller;

use App\Entity\About;
use App\Entity\Contacts;
use App\Entity\Experiences;
use App\Entity\Formations;
use App\Entity\InProgress;
use App\Entity\Productions;
use App\Entity\Skills;
use App\Entity\SkillTypes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $about = $this->getDoctrine()->getRepository(About::class)->findAll();
        $contacts = $this->getDoctrine()->getRepository(Contacts::class)->findAll();
        $experiences = $this->getDoctrine()->getRepository(Experiences::class)->findAll();
        $formations = $this->getDoctrine()->getRepository(Formations::class)->findAll();
        $in_progress = $this->getDoctrine()->getRepository(InProgress::class)->findAll();
        $productions = $this->getDoctrine()->getRepository(Productions::class)->findAll();
        $skill_types = $this->getDoctrine()->getRepository(SkillTypes::class)->findAll();

        $skills = [];
        foreach ( $skill_types as $skill_type ) {
            $skills[] = $skill_type->getSkills()->toArray();
        }

        return $this->render('home/index.html.twig', [
            'about' => $about,
            'contacts' => $contacts,
            'experiences' => $experiences,
            'formations' => $formations,
            'in_progress' => $in_progress,
            'productions' => $productions,
            'skills' => $skills,
            'skill_types' => $skill_types
        ]);
    }
}
