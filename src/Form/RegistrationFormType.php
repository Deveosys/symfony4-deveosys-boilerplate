<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('displayName', TextType::class, [
              'attr' => [
                'class' => 'uk-input uk-border-pill',
                'placeholder' => 'Username'
              ]
            ])
            ->add('email', EmailType::class, [
              'attr' => [
                'class' => 'uk-input uk-border-pill',
                'placeholder' => 'Email'
              ]
            ])
            ->add('plainPassword', PasswordType::class, [
              'attr' => [
                'class' => 'uk-input uk-border-pill',
                'placeholder' => 'Password'
              ],
              // instead of being set onto the object directly,
              // this is read and encoded in the controller
              'mapped' => false,
              'constraints' => [
                  new NotBlank([
                      'message' => 'Please enter a password',
                  ]),
                  new Length([
                      'min' => 6,
                      'minMessage' => 'Your password should be at least {{ limit }} characters',
                      // max length allowed by Symfony for security reasons
                      'max' => 4096,
                  ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
