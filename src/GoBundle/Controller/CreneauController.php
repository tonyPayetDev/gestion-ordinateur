<?php

namespace GoBundle\Controller;

use GoBundle\Entity\Creneau;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Creneau Controller.
 *
 * @Route("creneaus")
 */
class CreneauController extends Controller
{
    /**
     * Lister [ROLE_ADMIN].
     *
     * @Route("/", name="gobundle_creneaus_lister", methods={"GET"})
     * @Template("@Go/Listes/Liste.html.twig")
     */
    public function listerAction()
    {
        return [
            'items' => $this->getDoctrine()->getManager()->createQuery(
                'SELECT creneau.id, creneau.titre FROM GoBundle:Creneau as creneau'
            )->getArrayResult(),
            'actions' => [
                'lister'    => 'gobundle_creneaus_lister',
                'editer'    => 'gobundle_creneau_edition',
                'dupliquer' => 'gobundle_creneau_edition',
                'supprimer' => 'gobundle_creneau_suppression',
            ],
            'entite'    => 'Creneau',
            'entiteNom' => 'creneaus',
        ];
    }

    /**
     * Formulaire d'ajout/edition [ROLE_ADMIN].
     *
     * @Route("/edition/{Creneau}", name="gobundle_creneau_edition", methods={"GET","POST"}, requirements={"Creneau" = "\d+"})
     * @Template("@Go/Formulaires/Formulaire.html.twig")
     */
    public function editerAction(Request $request, Creneau $Creneau = null)
    {
        if (null === $Creneau) {
            $Creneau = new  Creneau();
        } elseif ($request->query->has('copie')) {
            $Creneau = clone $Creneau;
        }

        $form = $this->createForm('GoBundle\Form\CreneauType', $Creneau);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $id = $Creneau->getId();
                $em = $this->getDoctrine()->getManager();
                $em->persist($Creneau);
                $em->flush();
                $this->get('event_dispatcher')->dispatch(
                    'enregistrement',
                    new GenericEvent('enregistrement', ['nom' => 'Creneau', 'Entity' => $Creneau, 'id' => $id])
                );

                return $this->redirect($this->generateUrl('gobundle_creneaus_lister'));
            }
        }

        return [
            'form'      => $form->createView(),
            'entiteNom' => 'creneau',
            'retour'    => 'gobundle_creneaus_lister',
        ];
    }

    /**
     * Suppression [ROLE_ADMIN].
     *
     * @Route("/suppression/{Creneau}", name="gobundle_creneau_suppression", methods={"GET"}, requirements={"Creneau" = "\d+"})
     */
    public function supprimerAction(Request $request, Creneau $Creneau)
    {
        if ($request->isMethod('GET')) {
            $id = $Creneau->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($Creneau);
            $em->flush();
            $this->get('event_dispatcher')->dispatch(
                'suppression',
                new GenericEvent('suppression', ['nom' => 'Creneau', 'id' => $id])
            );

            return $this->redirect($this->generateUrl('gobundle_creneaus_lister'));
        }
        throw $this->createAccessDeniedException('You cannot access this page!');
    }
}
