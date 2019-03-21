<?php

namespace GoBundle\Controller;

use GoBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Utilisateur Controller.
 *
 * @Route("utilisateurs")
 */
class UtilisateurController extends Controller
{
    /**
     * Lister [ROLE_ADMIN].
     *
     * @Route("/", name="gobundle_utilisateurs_lister", methods={"GET"})
     * @Template("@Go/Listes/Liste.html.twig")
     */
    public function listerAction()
    {
        return [
            'items' => $this->getDoctrine()->getManager()->createQuery(
                'SELECT utilisateur.id, utilisateur.nom FROM GoBundle:Utilisateur as utilisateur'
            )->getArrayResult(),
            'actions' => [
                'lister'    => 'gobundle_utilisateurs_lister',
                'editer'    => 'gobundle_utilisateur_edition',
                'dupliquer' => 'gobundle_utilisateur_edition',
                'supprimer' => 'gobundle_utilisateur_suppression',
            ],
            'entite'    => 'Utilisateur',
            'entiteNom' => 'utilisateurs',
        ];
    }

    /**
     * Formulaire d'ajout/edition [ROLE_ADMIN].
     *
     * @Route("/edition/{Utilisateur}", name="gobundle_utilisateur_edition", methods={"GET","POST"}, requirements={"Utilisateur" = "\d+"})
     * @Template("@Go/Formulaires/Formulaire.html.twig")
     */
    public function editerAction(Request $request, Utilisateur $Utilisateur = null)
    {
        if (null === $Utilisateur) {
            $Utilisateur = new  Utilisateur();
        } elseif ($request->query->has('copie')) {
            $Utilisateur = clone $Utilisateur;
        }

        $form = $this->createForm('GoBundle\Form\UtilisateurType', $Utilisateur);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $id = $Utilisateur->getId();
                $em = $this->getDoctrine()->getManager();
                $em->persist($Utilisateur);
                $em->flush();
                $this->get('event_dispatcher')->dispatch(
                    'enregistrement',
                    new GenericEvent('enregistrement', ['nom' => 'Utilisateur', 'Entity' => $Utilisateur, 'id' => $id])
                );

                return $this->redirect($this->generateUrl('gobundle_utilisateurs_lister'));
            }
        }

        return [
            'form'      => $form->createView(),
            'entiteNom' => 'utilisateur',
            'retour'    => 'gobundle_utilisateurs_lister',
        ];
    }

    /**
     * Suppression [ROLE_ADMIN].
     *
     * @Route("/suppression/{Utilisateur}", name="gobundle_utilisateur_suppression", methods={"GET"}, requirements={"Utilisateur" = "\d+"})
     */
    public function supprimerAction(Request $request, Utilisateur $Utilisateur)
    {
        if ($request->isMethod('GET')) {
            $id = $Utilisateur->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($Utilisateur);
            $em->flush();
            $this->get('event_dispatcher')->dispatch(
                'suppression',
                new GenericEvent('suppression', ['nom' => 'Utilisateur', 'id' => $id])
            );

            return $this->redirect($this->generateUrl('gobundle_utilisateurs_lister'));
        }
        throw $this->createAccessDeniedException('You cannot access this page!');
    }
}
