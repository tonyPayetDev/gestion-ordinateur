<?php

namespace GoBundle\Utilisateurs\Controller;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilisateurControllerTest extends WebTestCase
{


    public function testCrud()
    {
//On liste

        $client = static::createClient();

        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_utilisateurs_lister'));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $nbItems = $crawler->filter('#dataTables tbody tr')->count();

//On Ajoute
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_utilisateur_edition', array('Utilisateur' => 0)));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $client->submit($crawler->selectButton('Sauvegarder')->form(array(
            'gobundle_utilisateur[nom]' => 'test',
        )));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems + 1);
        $id = max($crawler->filter('#dataTables tbody tr')->each(function (Crawler $node) {
            return $node->attr('data-id');
        }));

// On edite
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_utilisateur_edition', array('Utilisateur' => $id)));
        $this->assertTrue($client->getResponse()->getStatusCode() == 200);
        $client->submit($crawler->selectButton('Sauvegarder')->form(array(
            'gobundle_utilisateur[nom]' => 'test2',
        )));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems + 1);

// On supprime
        $crawler = $client->request('GET', $client->getContainer()->get('router')->generate('gobundle_utilisateur_suppression', array('Utilisateur' => $id)));
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertTrue($crawler->filter('#dataTables tbody tr')->count() == $nbItems);
    }

}


