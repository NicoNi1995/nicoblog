<?php

namespace App\Tests\IntegrationTest;

use App\Factory\PostFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EntityManagerTest extends KernelTestCase
{
    public function testEntityManager(): void
    {
        $kernel = self::bootKernel();

        //$this->assertSame('test',$kernel->getEnvironment());
        $entitymanager = self::getContainer()->get('doctrine.orm.entity_manager');
        //$this->assertInstanceOf(EntityManagerInterface::class,$entitymanager);


        $factory = static::getContainer()->get( "App\Factory\PostFactory" );
        $this->assertInstanceOf(PostFactory::class,$factory);

        $post1 = $factory->create('post title 02','post body 02');
        $entitymanager->persist($post1);
        $entitymanager->flush();
    }
}
