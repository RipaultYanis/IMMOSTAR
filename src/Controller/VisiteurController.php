<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\BienType;
use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;  
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Types;
use App\Form\TypesType;
use App\Entity\Visite;
use App\Entity\Visiteur;
use App\Form\VisiteType;
use App\Form\VisiteurType;
use App\Repository\TypesRepository;

class VisiteurController extends AbstractController
{
   /**
     * @Route("/ajouterVisiteur", name="Visiteur")
     */
  
public function ajouterVisiteur(Request $query){
    $visiteur= new Visiteur();
    $form = $this->createForm(VisiteurType::class, $visiteur);
    $form->handleRequest($query);
    if ($query->isMethod('POST')) {
    if ($form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($visiteur);
    $em->flush();
    $query->getSession()->getFlashBag()->add('notice', 'Visiteur Crée.');
    return $this->render('visiteur/Visiteur.html.twig',array('form'=>$form->createView()));
    }
   }
    return $this->render('visiteur/Visiteur.html.twig',array('form'=>$form->createView()));
    
}
/**
*
*@Route("/ajouterVisiteur/update/{id}",name="modifierVisiteur")
*
*/
public function modifierVisiteur(Request $request, $id){
$visiteur = new Visiteur() ;
$visiteur = $this->getDoctrine()->getManager()->getRepository(Visiteur::class)->getUnVisiteur($id);
$request->getSession()->getFlashBag()->add('notice', '');
$form = $this->createForm(VisiteurType::class, $visiteur);
if($request->isMethod('POST')){
$form->handleRequest($request);
if($form->isValid()){
$em = $this->getDoctrine()->getManager();
$em->flush();
$request->getSession()->getFlashBag()->add('success', 'Article modifié avec succès.');

return $this->redirectToRoute('modifierVisiteur',array('id'=>$id));
}
}
return $this->render( 'visiteur/ModifierVisiteur.html.twig', array('form' =>$form->createView(), 'visiteur'=>$visiteur));
}
}
