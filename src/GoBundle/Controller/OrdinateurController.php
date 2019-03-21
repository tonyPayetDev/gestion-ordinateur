<?php

namespace GoBundle\Controller;

use GoBundle\Entity\Ordinateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Ordinateur Controller.
 *
 * @Route("ordinateurs")
 */
class OrdinateurController extends Controller
{
    /**
     * Lister [ROLE_ADMIN].
     *
     * @Route("/", name="gobundle_ordinateurs_lister", methods={"GET"})
     * @Template("@Go/Listes/Liste.html.twig")
     */
    public function listerAction()
    {
        return [
            'items' => $this->getDoctrine()->getManager()->createQuery(
                'SELECT ordinateur.id, ordinateur.nom FROM GoBundle:Ordinateur as ordinateur'
            )->getArrayResult(),
            'actions' => [
                'lister'    => 'gobundle_ordinateurs_lister',
                'editer'    => 'gobundle_ordinateur_edition',
                'dupliquer' => 'gobundle_ordinateur_edition',
                'supprimer' => 'gobundle_ordinateur_suppression',
            ],
            'entite'    => 'Ordinateur',
            'entiteNom' => 'ordinateurs',
        ];
    }

    /**
     * Formulaire d'ajout/edition [ROLE_ADMIN].
     *
     * @Route("/edition/{Ordinateur}", name="gobundle_ordinateur_edition", methods={"GET","POST"}, requirements={"Ordinateur" = "\d+"})
     * @Template("@Go/Formulaires/Formulaire.html.twig")
     */
    public function editerAction(Request $request, Ordinateur $Ordinateur = null)
    {
        if (null === $Ordinateur) {
            $Ordinateur = new  Ordinateur();
        } elseif ($request->query->has('copie')) {
            $Ordinateur = clone $Ordinateur;
        }

        $form = $this->createForm('GoBundle\Form\OrdinateurType', $Ordinateur);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $id = $Ordinateur->getId();
                $em = $this->getDoctrine()->getManager();
                $em->persist($Ordinateur);
                $em->flush();
                $this->get('event_dispatcher')->dispatch(
                    'enregistrement',
                    new GenericEvent('enregistrement', ['nom' => 'Ordinateur', 'Entity' => $Ordinateur, 'id' => $id])
                );

                return $this->redirect($this->generateUrl('gobundle_ordinateurs_lister'));
            }
        }

        return [
            'form'      => $form->createView(),
            'entiteNom' => 'ordinateur',
            'retour'    => 'gobundle_ordinateurs_lister',
        ];
    }

    /**
     * Suppression [ROLE_ADMIN].
     *
     * @Route("/suppression/{Ordinateur}", name="gobundle_ordinateur_suppression", methods={"GET"}, requirements={"Ordinateur" = "\d+"})
     */
    public function supprimerAction(Request $request, Ordinateur $Ordinateur)
    {
        if ($request->isMethod('GET')) {
            $id = $Ordinateur->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($Ordinateur);
            $em->flush();
            $this->get('event_dispatcher')->dispatch(
                'suppression',
                new GenericEvent('suppression', ['nom' => 'Ordinateur', 'id' => $id])
            );

            return $this->redirect($this->generateUrl('gobundle_ordinateurs_lister'));
        }
        throw $this->createAccessDeniedException('You cannot access this page!');
    }
}
