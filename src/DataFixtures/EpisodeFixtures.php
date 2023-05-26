<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EPISODES = [
        [
            'season' => 1,
            'title' => 'Welcome to the playground',
            'number' => 1,
            'synopsis' => 'Sisters Powder and Vi find their parents dead among the bodies and the rubble of a battle on a bridge. They are taken in by Vander, the leader of the failed rebellion, as his own children. Years later, Vi and Powder rob a Piltover penthouse with their adopted brothers, Mylo and Claggor. Powder steals a set of magical crystals and accidentally shatters one. This causes an explosion that destroys a large portion of the building. Returning to the undercity, the siblings encounter Deckard and his thugs; while they beat them in a fistfight, Powder is chased and loses the loot. Vander, now a community leader in Zaun, scolds the children for their carelessness, and attempts to smooth things over with Grayson, the Sheriff of the enforcers, and her subordinate Marcus. Vi berates Mylo for calling Powder a "jinx" and reassures her sister that things will get better. In the lowest parts of the undercity, crime lord Silco extracts information from Deckard and tests a new mutagen known as Shimmer on a rat.',
        ],
        [
            'season' => 1,
            'title' => 'Some Mysteries Are Better Left Unsolved',
            'number' => 2,
            'synopsis' => "The crystals that Powder stole turn out to belong to Jayce Talis, a student at Piltover's academy. Piltover's ruling council has him testify about using illegal equipment in unsanctioned experiments. Jayce was saved by arcane magic as a child and believes it can be a new resource for Piltover's evolution. The academy expels him when he admits the magical nature of the experiments, and his research is ordered to be destroyed. On the verge of suicide, his beliefs are renewed when Viktor, the disabled assistant of the academy's professor Heimerdinger, offers to help him. In Zaun, Marcus pressures Vander to reveal the true culprits of the robbery, while Zaunites pressure him to fight back against the interference of the enforcers. He chooses to keep his family safe and remain neutral, leaving some unsure of his leadership. Vi decides to turn herself in. Meanwhile, Silco manipulates Deckard into swallowing a vial of Shimmer."
        ],
        [
            'season' => 1,
            'title' => 'The Base Violence Necessary for Change',
            'number' => 3,
            'synopsis' => "Vander stops Vi from turning herself in. Silco then captures him after Deckard, now heavily mutated, kills Grayson and her men, sparing only Marcus. Vi, Mylo, and Claggor go to rescue Vander, leaving Powder alone. In Piltover, Jayce and Viktor secretly work with the crystals under the discretion of councilor Mel Medarda and invent Hextech, a new arcane technology. It is revealed that Vander betrayed Silco in the past, and tried to drown him. In the undercity, the siblings reach Vander but are cut off by Silco. Vi fights off Silco's thugs, but is badly beaten by Deckard. Powder, attempting to save her, causes an explosion that kills Claggor and Mylo. Vander, wounded by Silco, takes Shimmer, kills Deckard and saves Vi before dying. In her grief, Vi hits Powder, calls her a jinx and walks away. Seeing Silco approach, Vi attempts to return to Powder but is ambushed and captured by Marcus. Believing Vi abandoned her, Powder breaks down in Silco's arms.",
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::EPISODES as $key => $value) {
                    $episode = new Episode();
                    $episode->setSeason($this->getReference( 'season_'. $value['season'] ));
                    $episode->setTitle($value['title']);
                    $episode->setNumber($value['number']);
                    $episode->setSynopsis($value['synopsis']);
                    $manager->persist($episode);
                }
                $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}