<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class FormSearch
 * @package BlogBundle\Forms
 */
class FormUploadFilesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'folder_name'
            )
            ->add(
                'upload_file',
                FileType::class,
                [
                    'multiple' => true,
                ]
            )
            ->add('upload',
                SubmitType::class,
                [
                    'label' => 'upload'
                ]
                );
    }
}
