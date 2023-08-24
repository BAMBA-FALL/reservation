<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Hotel;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class,["required"=>false,"label"=>"Active", "attr"=>["form-check-input"] ,"row_attr"=>["class"=>"form-switch"]])
            ->add('titre', TextType::class,["required"=>true])
            ->add('description',CKEditorType::class,["required"=>true])
            ->add('prix',MoneyType::class,["required"=>true])
            ->remove('slug')
            ->add('hotel',EntityType::class,["class"=>Hotel::class,"choice_label"=>"nom", "required"=>true])
            //https://symfony.com/doc/current/reference/forms/types/collection.html
            ->add('images', CollectionType::class, ['entry_type'=>ImageType::class, "allow_add"=>true, "by_reference"=>false,
             'allow_delete'=>true, 'label'=>false, "entry_options"=>["fromRoom"=>true, "isNew"=>$options["isNew"]]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
            "isNew"=>true
        ]);
    }
}
