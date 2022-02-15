<?php

namespace App\Tests\UnitTest;

use App\Entity\Post;
use PHPUnit\Framework\TestCase;
use App\Factory\PostFactory;

class PostFactoryTest extends TestCase
{
    public function testFactory(): void
    {
        $factory = new PostFactory();
        $post = $factory->create('nico','nico','nico',);

        $this->assertInstanceOf(Post::class,$post);
        $this->assertSame('draft',$post->getStatus());
    }
}
