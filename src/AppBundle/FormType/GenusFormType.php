<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 29.03.17
 * Time: 21:12
 */

namespace AppBundle\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GenusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('specialCount')->add('fact');
    }
}