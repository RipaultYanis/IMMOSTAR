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

class VisiteController extends AbstractController
{
  /**
     * @Route("/ajouterVisite", name="Visite")
     */
  
public function ajouterVisite(Request $query){
    $visite= new Visite();
    $form = $this->createForm(VisiteType::class, $visite);
    $form->handleRequest($query);
    if ($query->isMethod('POST')) {
    if ($form->isValid()) {
    $em = $this->getDoctrine()->getManager();
    $em->persist($visite);
    $em->flush();
    $query->getSession()->getFlashBag()->add('notice', 'Visite Crée.');
    return $this->render('visite/Visite.html.twig',array('form'=>$form->createView()));
    }
   }
    return $this->render('visite/Visite.html.twig',array('form'=>$form->createView()));
    
}
}
