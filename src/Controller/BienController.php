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

class BienController extends AbstractController
{
   /**
     * @Route("/ajouterBien", name="Bien")
     */
  
public function ajouterBien(Request $query){
    $bien= new Bien();
    $form = $this->createForm(BienType::class, $bien);
    $form->handleRequest($query);
    if ($query->isMethod('POST')) {
      if ($form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($bien);
      $em->flush();
      $query->getSession()->getFlashBag()->add('notice', 'Bien Crée.');
      return $this->render('bien/Bien.html.twig',array('form'=>$form->createView()));
      }
   }
    return $this->render('bien/Bien.html.twig',array('form'=>$form->createView()));
    
}
/**
*
*@Route("/ajouterBien/update/{id}",name="modifierBien")
*
*/
public function modifierBien(Request $request, $id){
   $bien = new Bien() ;
   $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->getUnBien($id);
   $request->getSession()->getFlashBag()->add('notice', '');
   $form = $this->createForm(BienType::class, $bien);
   if($request->isMethod('POST')){
      $form->handleRequest($request);
      if($form->isValid()){
         $em = $this->getDoctrine()->getManager();
         $em->flush();
         $request->getSession()->getFlashBag()->add('success');
         return $this->redirectToRoute('modifierBien',array('id'=>$id));
      }
   }
   return $this->render( 'bien/ModifierBien.html.twig', array('form' =>$form->createView(), 'bien'=>$bien));
   }

/**
*
*@Route("/ajouterBien/liste/{type}",name="afficherBienParType")
*
*/
public function getBienParType(Request $request,$type)
{
       
        $em = $this->getDoctrine()->getManager();
        $valeur = $em->getRepository(Bien::class)->getBienParType($type);    
        return $this->render('bien/BienParType.html.twig',array('result'=>$valeur));
     }
     public function getBien(){
         $bien = new Bien() ;
         $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->fetchAll();
         
     }
}

