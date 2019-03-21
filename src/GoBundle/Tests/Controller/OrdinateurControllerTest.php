<?php

namespace GoBundle\Ordinateurs\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;

class OrdinateurControllerTest extends WebTestCase
{
    public function testCrud()
    {
        //On liste

        $client = static::createClient();

        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_ordinateurs_lister'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
        $nbItems = $crawler->filter('#dataTables tbody tr')->count();

        //On Ajoute
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_ordinateur_edition', ['Ordinateur' => 0]));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
        $client->submit($crawler->selectButton('Sauvegarder')->form([
            'gobundle_ordinateur[nom]' => 'test',
        ]));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() === $nbItems + 1);
        $id = max($crawler->filter('#dataTables tbody tr')->each(function (Crawler $node) {
            return $node->attr('data-id');
        }));

        // On edite
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_ordinateur_edition', ['Ordinateur' => $id]));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());
        $client->submit($crawler->selectButton('Sauvegarder')->form([
            'gobundle_ordinateur[nom]' => 'test2',
        ]));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() === $nbItems + 1);

        // On supprime
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_ordinateur_suppression', ['Ordinateur' => $id]));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() === $nbItems);
    }
}
