<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\PasswordStrength;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // First name
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'Votre prénom',
                    'autocomplete' => 'given-name',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'le prénom est requis'
                    ),
                    new Length(
                        min: 2,
                        minMessage: 'Votre prénom doit contenir au moins {{ limit }} caractères.',
                        max: 100,
                        maxMessage: 'Votre prénom ne peut pas contenir plus de {{ limit }} caractères.',
                    ),
                ],
            ])

            // Last name
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'Votre nom',
                    'autocomplete' => 'family-name',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'Please enter your last name.'
                    ),
                    new Length(
                        min: 2,
                        minMessage: 'Votre nom doit contenir au moins {{ limit }} caractères.',
                        max: 100,
                        maxMessage: 'Votre nom ne peut pas contenir plus de {{ limit }} caractères.',
                    ),
                ],
            ])

            // Email
            ->add('email', EmailType::class, [
                'label' => 'Addresse email',
                'attr' => [
                    'class' => 'input',
                    'placeholder' => 'you@example.com',
                    'autocomplete' => 'email',
                ],
                'constraints' => [
                    new NotBlank(
                        message: 'L\'addresse email est requis'
                    ),
                    new Email(
                        message: 'Votre email n\'est pas valide'
                    ),
                    new Length(
                        max: 180,
                        maxMessage: 'Votre adresse e-mail ne peut pas contenir plus de {{ limit }} caractères.',
                    ),
                ],
            ])

            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'required' => true,

                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'class' => 'input',
                        'placeholder' => 'Saisissez votre mot de passe',
                        'autocomplete' => 'new-password',
                    ],
                ],

                'second_options' => [
                    'label' => 'Confirmation du mot de passe',
                    'attr' => [
                        'class' => 'input',
                        'placeholder' => 'Confirmez votre mot de passe',
                        'autocomplete' => 'new-password',
                    ],
                ],

                'constraints' => [
                    new NotBlank(
                        message: 'Le mot de passe est requis.'
                    ),

                    new Length(
                        min: 8,
                        minMessage: 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                        max: 4096,
                        maxMessage: 'Votre mot de passe ne peut pas contenir plus de {{ limit }} caractères.',
                    ),
                ],
            ])
            // new PasswordStrength(
            //     minScore: PasswordStrength::STRENGTH_MEDIUM,
            //     message: 'Your password is too weak. Please choose a stronger password.',
            // ),

            // Conditions générales
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'J’accepte les conditions générales.',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'size-4 rounded border-gray-300 text-primary-dark focus:ring-primary-dark',
                ],
                'constraints' => [
                    new IsTrue(
                        message: 'Vous devez accepter les conditions générales.'
                    ),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
