<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const SEASONS = [
        [
            'program' => 'Arcane',
            'number' => 1,
            'year' => 2021,
            'description' => 'This is the first and only season'
        ],
        [
            'program' => 'Avatar the last airbender',
            'number' => 1,
            'year' => 2000,
            'description' => 'Aang meets Katara and Sokha and tries to master waterbending.'
        ],
        [
            'program' => 'Scrubs',
            'number' => 1,
            'year' => 2007,
            'description' => 'Dorian starts his internship at the Sacred Heart Hospital.'
        ],
        [
            'program' => 'House of the dragon',
            'number' => 1,
            'year' => 2022,
            'description' => 'Prequel and first installments of the Dance of the Dragons.'
        ],
        [
            'program' => 'Outlander',
            'number' => 1,
            'year' => 2015,
            'description' => 'Claire\'s arrival in the Highlands.'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASONS as $key => $value) {
                $season = new Season();
                $season->setProgram($this->getReference('program_' . str_replace(' ', '', $value['program'])));
                $season->setNumber($value['number']);
                $season->setYear($value['year']);
                $season->setDescription($value['description']);
                $this->setReference('season_' . $value['number'], $season);
                $manager->persist($season);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}