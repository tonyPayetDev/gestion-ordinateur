<?php

namespace GoBundle\Controller;

use GoBundle\Entity\Attribution;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Attribution Controller.
 *
 * @Route("/")
 */
class AttributionController extends Controller
{
    /**
     * Lister [ROLE_ADMIN].
     *
     * @Route("/", name="gobundle_attributions_lister", methods={"GET"})
     * @Template("@Go/Listes/Liste.html.twig")
     */
    public function listerAction()
    {
        $attributions = $this->getDoctrine()->getManager()->getRepository('GoBundle:Attribution')->findAll();
        $items = [];

        foreach ($attributions as $key => $value) {
            $items[$key]['id'] = $value->getId();
            $items[$key]['Titre attribution'] = $value->getTitre();
            $items[$key]['Utilisateurs'] = $value->getUtilisateur()->getNom();
            $items[$key]['Ordinateurs'] = $value->getOrdinateur()->getNom();
            $items[$key]['Creneaux'] = $value->getCreneau()->getTitre();
        }

        return [
            'items'   => $items,
            'actions' => [
                'lister'    => 'gobundle_attributions_lister',
                'editer'    => 'gobundle_attribution_edition',
                'dupliquer' => 'gobundle_attribution_edition',
                'supprimer' => 'gobundle_attribution_suppression',
            ],
            'entite'    => 'Attribution',
            'entiteNom' => 'attributions',
        ];
    }

    /**
     * Formulaire d'ajout/edition [ROLE_ADMIN].
     *
     * @Route("/edition/{Attribution}", name="gobundle_attribution_edition", methods={"GET","POST"}, requirements={"Attribution" = "\d+"})
     * @Template("@Go/Formulaires/Formulaire.html.twig")
     */
    public function editerAction(Request $request, Attribution $Attribution = null)
    {
        if (null === $Attribution) {
            $Attribution = new  Attribution();
        } elseif ($request->query->has('copie')) {
            $Attribution = clone $Attribution;
        }

        $form = $this->createForm('GoBundle\Form\AttributionType', $Attribution);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $id = $Attribution->getId();
                $em = $this->getDoctrine()->getManager();
                $em->persist($Attribution);
                try {
                    $em->flush();
                } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
                    $this->addFlash('warning', "Cette ordi a deja etais attribuer veuillez annuler l'attribution avant changement ");

                    return $this->redirect($this->generateUrl('gobundle_attribution_edition'));
                    throw $e;
                }
                $this->get('event_dispatcher')->dispatch(
                    'enregistrement',
                    new GenericEvent('enregistrement', ['nom' => 'Attribution', 'Entity' => $Attribution, 'id' => $id])
                );

                return $this->redirect($this->generateUrl('gobundle_attributions_lister'));
            }
        }

        return [
            'form'      => $form->createView(),
            'entiteNom' => 'attribution',
            'retour'    => 'gobundle_attributions_lister',
        ];
    }

    /**
     * Suppression [ROLE_ADMIN].
     *
     * @Route("/suppression/{Attribution}", name="gobundle_attribution_suppression", methods={"GET"}, requirements={"Attribution" = "\d+"})
     */
    public function supprimerAction(Request $request, Attribution $Attribution)
    {
        if ($request->isMethod('GET')) {
            $id = $Attribution->getId();
            $em = $this->getDoctrine()->getManager();
            $em->remove($Attribution);
            $em->flush();
            $this->get('event_dispatcher')->dispatch(
                'suppression',
                new GenericEvent('suppression', ['nom' => 'Attribution', 'id' => $id])
            );

            return $this->redirect($this->generateUrl('gobundle_attributions_lister'));
        }
        throw $this->createAccessDeniedException('You cannot access this page!');
    }
}
