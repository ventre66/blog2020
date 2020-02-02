<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, array(
                //'data_class' => null,
                'label' => false,
                'required' => true,
                'attr' => array(
                    'class' => 'NoteFraisBootstrapFileInput',
                    'type' => 'file',
                    'placeholder' => 'Selectionner un justificatif (jpeg, png, jpg, pdf)',
                    'data-preview-file-type' => 'text',
                    'data-allowed-file-extensions' => '["jpeg", "png", "jpg", "pdf"]',
                )
            ))
            ->add('titre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
