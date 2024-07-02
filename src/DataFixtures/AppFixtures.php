<?php

namespace App\DataFixtures;

use App\Entity\AboutMeInfo;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $article1 = new Article();
        $article1->setTitle('Artykul 1');
        $article1->setContent('In vel ipsum gravida, bibendum lectus eget, pretium leo. Aenean commodo, massa vitae tincidunt cursus, ex sapien venenatis elit, vel faucibus orci nunc at sapien. Vivamus congue congue feugiat. Ut tempus molestie felis vitae dapibus. Vivamus commodo tellus nibh, vitae euismod tortor porta ut. Quisque a erat velit. Sed tempor suscipit est ut consectetur. Nulla ultricies condimentum viverra. Suspendisse non vehicula eros. Mauris elementum lectus et nibh sollicitudin rutrum. Ut posuere tellus ante, in faucibus augue suscipit eget. ');
        $article1->setCreated(new \DateTime('24.06.2024'));
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setTitle('Artykul 2');
        $article2->setContent('Vestibulum pretium velit sit amet efficitur consequat. Maecenas tincidunt lorem ligula, ac placerat neque vehicula non. Curabitur dignissim accumsan dui in sagittis. Proin condimentum sapien non bibendum vehicula. Curabitur vitae finibus nibh. Duis vel turpis congue, lobortis augue eget, elementum dolor. Nunc facilisis dui vel nulla dictum, at posuere justo cursus. Morbi pretium ut ipsum id mattis. Mauris posuere lobortis posuere. Pellentesque maximus, elit et rhoncus pulvinar, nunc ipsum placerat lorem, efficitur vehicula nibh nisl non enim. In imperdiet dolor in enim viverra, nec condimentum urna venenatis. Vivamus aliquet risus eget sem dignissim dapibus. Aenean auctor ornare lacus. Maecenas fermentum interdum diam, non mollis lectus faucibus in. Integer felis neque, tempus faucibus lorem a, imperdiet iaculis justo. Phasellus nibh lectus, porta a faucibus sit amet, auctor in est. ');
        $article2->setCreated(new \DateTime('25.06.2024'));
        $manager->persist($article2);

        $article3 = new Article();
        $article3->setTitle('Artykul 3');
        $article3->setContent('Aenean tempor porttitor tortor, nec porta ligula porta non. Suspendisse sit amet pharetra nunc. Suspendisse in enim pretium, elementum eros sed, hendrerit mauris. Mauris mattis malesuada sapien, id suscipit odio viverra nec. Nam facilisis, lectus in placerat maximus, quam urna posuere enim, et convallis nulla felis eget purus. Proin rutrum, urna ac elementum suscipit, nunc felis feugiat dui, eu lacinia tellus ex in risus. Nam faucibus elit ex, non elementum justo rhoncus at. Etiam a fermentum justo. Aliquam id urna vel nisl dictum dictum in vitae augue. Vivamus ultricies nunc at quam viverra, eget vulputate neque consectetur. Cras nec mauris condimentum, ullamcorper risus at, efficitur sem. ');
        $article3->setCreated(new \DateTime('26.06.2024'));
        $manager->persist($article3);

        $about1 = new AboutMeInfo();
        $about1->setKey('name');
        $about1->setValue('Mieszko');
        $manager->persist($about1);

        $about2 = new AboutMeInfo();
        $about2->setKey('lastname');
        $about2->setValue('Grempka');
        $manager->persist($about2);

        $manager->flush();
    }
}
