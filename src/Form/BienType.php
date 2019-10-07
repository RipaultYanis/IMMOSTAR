<?php

namespace App\Form;

use App\Entity\Bien;
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

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nb_piece',NumberType::class,array('label'=>'Nombre de Pieces :','attr'=>array('class'=>'form-control','placeholder'=>'Nombre de pieces...')))
            ->add('nb_chambre',NumberType::class,array('label'=>'Nombre de Chambre :','attr'=>array('class'=>'form-control','placeholder'=>'Nombre de chambres...')))
            ->add('superficie',NumberType::class,array('label'=>'Superficie :','attr'=>array('class'=>'form-control','placeholder'=>'Superficie...')))
            ->add('prix',NumberType::class,array('label'=>'Prix :','attr'=>array('class'=>'form-control','placeholder'=>'Prix...')))
            ->add('chauffage',TextType::class,array('label'=>'Chauffage :','attr'=>array('class'=>'form-control','placeholder'=>'Chauffage...')))
            ->add('annee',NumberType::class,array('label'=>'Annee :','attr'=>array('class'=>'form-control','placeholder'=>'Année...')))
            ->add('localisation',TextType::class,array('label'=>'Localisation :','attr'=>array('class'=>'form-control','placeholder'=>'Localisation...')))
            ->add('etat',TextType::class,array('label'=>'Etat :','attr'=>array('class'=>'form-control','placeholder'=>'Etat...')))
            ->add('idType',EntityType::class,array('class'=> Types::class,'choice_label'=>'libelle'))
            ->add('valider',SubmitType::class,array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn block')))
            ->add('annuler',ResetType::class,array('label'=>'Effacer','attr'=>array('class'=>'btn btn-primary btn block')))
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
