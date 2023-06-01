<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS = [
        [
            'title' => 'Arcane',
            'synopsis' => 'In the utopian city of Piltover, sisters Vi and Jinx find themselves on opposing sides of a brewing conflict over clashing convictions and arcane technologies.',
            'category' => 'Anime',
            'poster' => 'poster_arcane.jpg'
        ],
        [
            'title' => 'Avatar the last airbender',
            'synopsis' => 'In a war-torn world of elemental magic, a young boy reawakens to undertake a dangerous mystic quest to fulfill his destiny as the Avatar and bring peace back to the world.',
            'category' => 'Anime',
            'poster' => 'poster_avatar.jpg'
        ],
        [
            'title' => 'Scrubs',
            'synopsis' => 'A young doctor struggling to move his medical career forward as he deals with eccentric staff, unpredictable patients, and absurd situations.',
            'category' => 'Humor',
            'poster' => 'poster_scrubs.jpg'
        ],
        [
            'title' => 'House of the dragon',
            'synopsis' => 'King Viserys I Targaryen rules over an unprecedented time of peace, but questions about his succession threaten to send the realm into chaos.',
            'category' => 'Fantasy',
            'poster' => 'poster_houseofthedragon.jpg'
        ],
        [
            'title' => 'Outlander',
            'synopsis' => 'A married combat nurse from 1945 is mysteriously swept back in time to 1743, where she is immediately thrown into an unknown world where her life is threatened.',
            'category' => 'Romance',
            'poster' => 'poster_outlander.jpg'
        ],
        [
            'title' => 'Brooklyn Nine-Nine',
            'synopsis' => 'Captain Raymond Holt takes over Brooklyn\'s 99th precinct, which includes Detective Jake Peralta, a talented but carefree detective who\'s used to doing whatever he wants.',
            'category' => 'Humor',
            'poster' => 'poster_brooklyn99.jpg'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAMS as $key => $value) {
            $program = new Program();
            $program->setTitle($value['title']);
            $program->setSynopsis($value['synopsis']);
            $program->setPoster($value['poster']);
            $program->setCategory($this->getReference('category_' . $value['category']));
            $this->addReference('program_' . str_replace(' ','',  $value['title']), $program);
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
