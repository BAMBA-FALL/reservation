<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile',FileType::class,["required"=>$options["isNew"], "label"=>"Image","attr"=>["class"=>"select-image"]] )
            ->remove('imageName')
            //l'option data permet d'afficher une valeur par défaut
            // ->remove('updatedAt')
            ->add('rankOrder', IntegerType::class,["required"=>true, "data"=>1, "attr"=>["min"=>1]])
 
        
        ;
        if(!$options["fromRoom"]){
            $builder
              //Pour rappel le choice_label permet de choisir le champ qui sera afficher dans le select
               //Auquel cas on pas besoin de la méthode magic __toString() dans l'entité
                ->add('room', EntityType::class,["class"=>Room::class, "choice_label"=>"titre"])
                ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
            'fromRoom'=>false,
            'isNew'=>true,
        ]);
    }
}
