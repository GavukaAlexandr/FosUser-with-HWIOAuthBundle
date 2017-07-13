<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FosUserOverrideBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class ProfileFormType extends AbstractType
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );

        if (!empty($options['validation_groups'])) {
            $constraintsOptions['groups'] = array(reset($options['validation_groups']));
        }

        $builder
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'Email*', 'translation_domain' => 'FOSUserBundle'))
            ->add('email_me', CheckboxType::class,
                [
                    'label' => 'Please email me about updates and news',
                    'label_attr' => [
                        'class' => 'col-sm-4 control-label',
                    ],
                    'required' => false

                ])
            ->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
                'label' => 'Password*',
                'translation_domain' => 'FOSUserBundle',
                'mapped' => false,
                'constraints' => new UserPassword($constraintsOptions),
            ))
            ->add('first_name', TextType::class,
                [
                    'label' => 'First Name*'
                ])
            ->add('last_name', TextType::class,
                [
                    'label' => 'Last Name(Family Name)*'
                ])
            ->add('business_name', TextType::class,
                [
                    'label' => 'Business Name(Optional)',
                    'label_attr' => [
                    ],
                    'required' => false
                ])
            ->add('address', TextType::class,
                [
                    'label' => 'Address*'
                ])
            ->add('city', TextType::class,
                [
                    'label' => 'City*'
                ])
            ->add('region', TextType::class,
                [
                    'label' => 'Region*'
                ])
            ->add('zip_code', TextType::class,
                [
                    'label' => 'Zip Code(Postal Code)*'
                ])
            ->add('Country', ChoiceType::class,
                [
                    'label' => 'Country*',
                    'choices' => [
                        'USA' => 'USA',
                        'Canada' => 'Canada'
                    ]
                ])
            ->add('vat_number', TextType::class,
                [
                    'label' => 'VAT number(if applicable)',
                    'label_attr' => [
                    ],
                    'required' => false


                ])
            ->remove('username')
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getName()
    {
        return 'app_user_profile';
    }
}
