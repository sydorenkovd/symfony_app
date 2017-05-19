<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 19.05.17
 * Time: 11:05
 */

namespace AppBundle\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username')
            ->add('_password');
    }
}