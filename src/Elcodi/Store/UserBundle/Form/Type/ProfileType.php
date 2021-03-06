<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 * @author Elcodi Team <tech@elcodi.com>
 */

namespace Elcodi\Store\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ProfileType
 */
class ProfileType extends AbstractType
{
    /**
     * @var string
     *
     * Customer namespace
     */
    protected $customerNamespace;

    /**
     * Constructor
     *
     * @param string $customerNamespace Customer names
     */
    public function __construct($customerNamespace)
    {
        $this->customerNamespace = $customerNamespace;
    }

    /**
     * Default form options
     *
     * @param OptionsResolverInterface $resolver
     *
     * @return array With the options
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => $this->customerNamespace,
        ]);
    }

    /**
     * Buildform function
     *
     * @param FormBuilderInterface $builder the formBuilder
     * @param array                $options the options for this form
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('firstname', 'text', [
                'required' => true,
                'label'    => 'store.user.form.fields.firstname.label',
            ])
            ->add('lastname', 'text', [
                'required' => true,
                'label'    => 'store.user.form.fields.lastname.label',
            ])
            ->add('email', 'email', [
                'required' => true,
                'label'    => 'store.user.form.fields.email.label',
            ])
            ->add('password', 'repeated', [
                'type'           => 'password',
                'first_options'  => [
                    'label' => 'store.user.form.fields.password.label',
                ],
                'second_options' => [
                    'label' => 'store.user.form.fields.repeat_password.label',
                ],
                'required'       => false,
            ])
            ->add('send', 'submit', [
                'label' => 'store.user.form.fields.send.label',
            ]);
    }

    /**
     * Return unique name for this form
     *
     * @return string
     */
    public function getName()
    {
        return 'store_user_form_type_profile';
    }
}
