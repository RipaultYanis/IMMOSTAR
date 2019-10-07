<?php

namespace App\Form;

use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Bien;
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
use App\Entity\Visiteur;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Suite',TextType::class,array('label'=>'Suite :','attr'=>array('class'=>'form-control','placeholder'=>'Avis...')))
            ->add('id_date',TextType::class,array('label'=>'Date :','attr'=>array('class'=>'form-control','placeholder'=>'Date...')))
            ->add('id_bien',EntityType::class,array('class'=> Bien::class,'choice_label'=>'id'))
            ->add('id_visiteur',EntityType::class,array('class'=> Visiteur::class,'choice_label'=>'nom'))
            ->add('valider',SubmitType::class,array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn block')))
            ->add('annuler',ResetType::class,array('label'=>'Effacer','attr'=>array('class'=>'btn btn-primary btn block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
