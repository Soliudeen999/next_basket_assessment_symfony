<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('firstname', TextType::class, [
                    'constraints' => [
                        new NotBlank(),
                    ],
                    'attr' => [
                        'class' => 'border sm:mx-auto sm:w-full my-3 sm:max-w-sm px-4 py-1 lock text-sm font-medium leading-6 text-gray-900'
                    ],
                ])
                ->add('lastname', TextType::class, [
                    'constraints' => [
                        new NotBlank(),
                    ],
                    'attr' => [
                        'class' => 'border sm:mx-auto sm:w-full my-3 sm:max-w-sm px-4 py-1 lock text-sm font-medium leading-6 text-gray-900'
                    ],
                ])
                ->add('email', EmailType::class, [
                    'constraints' => [
                        new NotBlank(),
                        new Email(),
                    ],
                    'attr' => [
                        'class' => 'border sm:mx-auto sm:w-full my-3 sm:max-w-sm px-4 py-1 lock text-sm font-medium leading-6 text-gray-900'
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
