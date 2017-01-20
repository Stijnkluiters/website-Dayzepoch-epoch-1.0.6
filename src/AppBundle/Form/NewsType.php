<?php


// src/AppBundle/Form/ProductType.php
namespace AppBundle\Form;

use AppBundle\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class NewsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,['error_bubbling'=>'true'])
            ->add('content', TextareaType::class,['error_bubbling'=>'true'])
            ->add('image', FileType::class,['error_bubbling'=>'true'])
            ->add('save', SubmitType::class, array('label' => 'Create new news'));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }

}


?>