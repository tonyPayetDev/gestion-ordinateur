<?php

namespace GoBundle\Attributions\Controller;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AttributionControllerTest extends WebTestCase
{


    public function testCrud()
    {
//On liste

        $client = static::createClient();

        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_attributions_lister'));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $nbItems = $crawler->filter('#dataTables tbody tr')->count();

//On Ajoute
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_attribution_edition', array('Attribution' => 0)));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $client->submit($crawler->selectButton('Sauvegarder')->form(array(
            'gobundle_attribution[titre]' => 'test',
        )));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems + 1);
        $id = max($crawler->filter('#dataTables tbody tr')->each(function (Crawler $node) {
            return $node->attr('data-id');
        }));

// On edite
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_attribution_edition', array('Attribution' => $id)));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $client->submit($crawler->selectButton('Sauvegarder')->form(array(
            'gobundle_attribution[titre]' => 'test2',
        )));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems + 1);

// On supprime
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_attribution_suppression', array('Attribution' => $id)));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems);
    }

}


