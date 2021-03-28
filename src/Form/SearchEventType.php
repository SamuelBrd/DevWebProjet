<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Permet la recherche avancée avec une recherche en fonction du nom
 * et de la date (affiche les événements de la recherche ayant une date supérieur à la date saisie)
 */
class SearchEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type_event', TextType::class)

            ->add('date_event', DateType::class, [
                'format' => 'dd-MM-yyyy',
            ])
        ;
    }
}
