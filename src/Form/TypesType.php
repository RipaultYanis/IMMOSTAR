<?php

namespace App\Form;

use App\Entity\Types;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class TypesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,array('label'=>'Libelle :','attr'=>array('class'=>'form-control','placeholder'=>'Libelle...')))
            ->add('valider',SubmitType::class,array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn block')))
            ->add('annuler',ResetType::class,array('label'=>'Effacer','attr'=>array('class'=>'btn btn-primary btn block')))
        
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Types::class,
        ]);
    }
}
