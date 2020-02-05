<?php

namespace App\DataFixtures;

use App\Entity\About;
use App\Entity\Contacts;
use App\Entity\Experiences;
use App\Entity\Formations;
use App\Entity\InProgress;
use App\Entity\Productions;
use App\Entity\Skills;
use App\Entity\SkillTypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->loadAbout($manager);
        $this->loadContacts($manager);
        $this->loadExperiences($manager);
        $this->loadFormations($manager);
        $this->loadInProgress($manager);
        $this->loadProductions($manager);
        $this->loadSkillTypes($manager);
        $this->loadSkills($manager);
    }

    public function loadAbout( ObjectManager $manager )
    {
        $about = new About();
        $about
            ->setDescription(
                'Passioné par le jeu d\'échecs depuis l\'enfance j\'ai participé à de'.
                            ' nombreux tournois internationaux et compétitions par équipes.'.
                            ' J\'ai notamment tenu le rôle de joueur et capitaine en Top 12, première division française.'
            );
        $manager->persist($about);
        $manager->flush();
    }

    public function loadContacts( ObjectManager $manager )
    {
        $data = [
            [
                'bertrand.grollemund@netcourrier.com',
                '<i class="fas fa-envelope fa-lg fa-fw"></i>',
                'mailto:bertrand.grollemund@netcourrier.com'
            ],
            [
                'LinkedIn',
                '<i class="fab fa-linkedin fa-lg fa-fw"></i>',
                'https://www.linkedin.com/in/bgrollemund'
            ],
            [
                'GitHub',
                '<i class="fab fa-github fa-lg fa-fw"></i>',
                'https://github.com/BGrollemund'
            ],
            [
                'CV PDF',
                '<i class="fas fa-file-pdf fa-lg fa-fw"></i>',
                'cvPdf/CV-BGrollemund.pdf'
            ]
        ];

        foreach ( $data as $datum ) {
            $contact = new Contacts();
            $contact
                ->setName($datum[0])
                ->setIcon($datum[1])
                ->setLink($datum[2]);
            $manager->persist($contact);
        }

        $manager->flush();
    }

    public function loadExperiences( ObjectManager $manager )
    {
        $data = [
            [
                '2005-2013',
                'Employé au cybercafé WWW (Montpellier)'
            ],
            [
                '2015-2018',
                'Entraîneur à l\'Echecs Club Montpellier'
            ]
        ];

        foreach ( $data as $datum ) {
            $experience = new Experiences();
            $experience
                ->setTitle($datum[0])
                ->setDetails($datum[1]);
            $manager->persist($experience);
        }

        $manager->flush();
    }

    public function loadFormations( ObjectManager $manager )
    {
        $data = [
            [
                '2004 : Université Montpellier 2',
                'Maîtrise de Mathématiques (BAC+4)'
            ],
            [
                '2020 : L\'idem, Le Soler',
                'Formation Qualifiante Pro Développeur Web et applications mobile'
            ]
        ];

        foreach ( $data as $datum ) {
            $formation = new Formations();
            $formation
                ->setTitle($datum[0])
                ->setDetails($datum[1]);
            $manager->persist($formation);
        }

        $manager->flush();
    }

    public function loadInProgress( ObjectManager $manager )
    {
        $in_progress = new InProgress();
        $in_progress
            ->setName('Formation Développeur Web')
            ->setIcon('<i class="fas fa-spinner fa-spin"></i>');
        $manager->persist($in_progress);

        $manager->flush();
    }

    public function loadProductions( ObjectManager $manager )
    {
        $data = [
            [
                'Démo site dynamique PhP',
                '<i class="fab fa-php fa-fw fa-lg"></i>',
                'https://github.com/BGrollemund/Demo-PhP-SiteDynamique'
            ],
            [
                'Démo Wordpress e-commerce',
                '<i class="fab fa-wordpress fa-fw fa-lg"></i>',
                'https://github.com/BGrollemund/Demo-Wordpress-eCommerce'
            ],
            [
                'Démo PhP Objet',
                '<i class="fab fa-php fa-fw fa-lg"></i>',
                'https://github.com/BGrollemund/Demo-PhP-Objet'
            ],
            [
                'Gestionnaire de Planning',
                '<i class="fab fa-js fa-fw fa-lg"></i>',
                'PlanningManager/index.html'
            ],
            /*
            [
                'Appli Conteur Loup-Garou',
                '<i class="fab fa-js fa-fw fa-lg"></i>',
                'LoupGarou/index.html'
            ],
            */
            [
                'Démo Symfony',
                '<i class="fab fa-symfony fa-fw fa-lg"></i>',
                'https://github.com/BGrollemund/Demo-Symfomy'
            ],
            [
                'CV Symfony',
                '<i class="fab fa-symfony fa-fw fa-lg"></i>',
                'https://github.com/BGrollemund/CV-Symfomy'
            ]
        ];

        foreach ( $data as $datum ) {
            $production = new Productions();
            $production
                ->setName($datum[0])
                ->setIcon($datum[1])
                ->setLink($datum[2]);
            $manager->persist($production);
        }

        $manager->flush();
    }

    public function loadSkillTypes( ObjectManager $manager )
    {
        $data = [ 'Langage', 'Framework', 'Extra', 'Langues' ];

        foreach ( $data as $key => $datum ) {
            $skill_type = new SkillTypes();
            $skill_type
                ->setName($datum);
            $this->setReference('skill_type_'.$key, $skill_type);
            $manager->persist($skill_type);
        }

        $manager->flush();
    }

    public function loadSkills( ObjectManager $manager )
    {
        $data = [
            [ 'PhP', '0' ], [ 'SQL', '0' ], [ 'JavaScript', '0' ], [ 'HTML - CSS', '0' ],
            [ 'Symfony', '1' ], [ 'Angular', '1' ], [ 'Ionic', '1' ], [ 'Wordpress', '1' ],
            [ 'Git', '2' ], [ 'CMS Wordpress', '2' ], [ 'Modélisation', '2' ], [ 'WebPack', '2' ], [ 'WebServices', '2' ],
            [ 'Français', '3' ], [ 'Anglais', '3' ], [ 'Espagnol', '3' ]
        ];

        foreach ( $data as $datum ) {
            $skill = new Skills();
            $skill
                ->setName($datum[0])
                ->setSkillType($this->getReference('skill_type_'.$datum[1]));
            $manager->persist($skill);
        }

        $manager->flush();
    }
}
