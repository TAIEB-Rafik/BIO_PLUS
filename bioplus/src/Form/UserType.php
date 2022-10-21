<?php 

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class , [ 'label' => 'Email', 'required' => true, 'attr' => ['placeholder' => 'Email']])
            ->add('name', TextType::class, [ 'label' => "Nom et prénom", 'required' => false, 'attr' => ['placeholder' => 'Nom et prénom']])
            ->add('gender', ChoiceType::class, [ 'label' => 'Sexe', 'required' => true, 'choices'  => ['Sexe' => '', 'Homme' => 'Homme','Femme' => 'Femme']])
            ->add('birthday', DateType::class, [ 'label' => 'Date de naissance','format' => 'dd MM yyyy','years' => range(date('Y') - 50, date('Y')), 'required' => true, 'attr' => ['placeholder' => 'Date de naissance']])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe', 'attr' => ['placeholder' => 'Mot de passe']),
                'second_options' => array('label' => 'Confirmer le mot de passe', 'attr' => ['placeholder' => 'Confirmer le mot de passe']),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}



 ?>
