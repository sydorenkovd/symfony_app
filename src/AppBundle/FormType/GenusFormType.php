<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 29.03.17
 * Time: 21:12
 */

namespace AppBundle\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('speciesCount')
            ->add('isPublished', ChoiceType::class, [
                'choices' => [
                    'yes' => true,
                    'no' => false
                ]
            ])
            ->add('subFamily', null, [
                'placeholder' => 'Choose a Sub Family'
            ])
            ->add('fact');
    }
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults(['data_class' => 'AppBundle\Entity\Genus']);
    }
}