<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Types;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('label'=>'Nom :','attr'=>array('class'=>'form-control','placeholder'=>'nom...')))
            ->add('prenom',TextType::class,array('label'=>'Prenom :','attr'=>array('class'=>'form-control','placeholder'=>'prenom...')))
            ->add('adresse',TextType::class,array('label'=>'Adresse :','attr'=>array('class'=>'form-control','placeholder'=>'Adresse ...')))
            ->add('telephone',TextType::class,array('label'=>'Telephone :','attr'=>array('class'=>'form-control','placeholder'=>'XX.XX.XX.XX.XX')))
            ->add('valider',SubmitType::class,array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn block')))
            ->add('annuler',ResetType::class,array('label'=>'Effacer','attr'=>array('class'=>'btn btn-primary btn block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}
