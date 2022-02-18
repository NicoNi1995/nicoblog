<?php

namespace App\Tests\FunctionalTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostDetailTest extends WebTestCase
{
    public function testCommentSubmit(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();

        $link = $crawler->selectLink('nico')->link();
        $pageDetailCrawler = $client->click($link);

        $this->assertResponseIsSuccessful();

//        $form = $pageDetailCrawler->selectButton('Submit')->form();
//        $form['comment[author]'] = 'NicoBlog';
//        $form['comment[email]'] = 'nishangzhi95@gmail.com';
//        $form['comment[message]'] = '“呐，你知道吗？听说樱花飘落的速度是秒速五厘米哦。" 秒速5厘米，那是樱花飘落的速度，那么怎样的速度才能走完我与你之间的距离？';
//        $client->submit($form);
//
//        $this->assertResponseIsSuccessful();
//        $this->assertStringContainsString('NicoBlog',$client->getResponse()->getContent());
//        $this->assertStringContainsString('呐，你知道吗？听说樱花飘落',$client->getResponse()->getContent());

    }
}
