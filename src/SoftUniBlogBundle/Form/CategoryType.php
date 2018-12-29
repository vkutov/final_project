<?php

namespace SoftUniBlogBundle\Form;

use SoftUniBlogBundle\Entity\Actor;
use SoftUniBlogBundle\Entity\Category;
use SoftUniBlogBundle\Entity\Event;
use SoftUniBlogBundle\Entity\Quote;
use SoftUniBlogBundle\Entity\Symbol;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextareaType::class)
//            ->add('verse', TextareaType::class)
//            ->add('place', TextType::class)
            ->add('meaning', TextareaType::class)

//            ->add('actors', ChoiceType::class, [
//                'choices' => [
//                    'id' => 'id',
//                    'title' => 'title'
//                ]
//            ])
            ->add('quotes',EntityType::class,[
                'required'   => false,
                'class' => Quote::class,
                'choice_label' => 'verse',
                'placeholder' => '',
                'multiple' => true
            ])
            ->add('actors',EntityType::class,[
                'required'   => false,
                'class' => Actor::class,
                'choice_label' => function(Actor $actor){
                    return $actor->getTitle().' ('.$actor->getMeaning().')';
                },
                'placeholder' => '',
                'multiple' => true
            ])
            ->add('events',EntityType::class,[
                'required'   => false,
                'class' => Event::class,
                'choice_label' => 'title',
                'placeholder' => '',
                'multiple' => true
            ])
            ->add('symbols',EntityType::class,[
                'required'   => false,
                'class' => Symbol::class,
                'choice_label' => 'name',
                'placeholder' => '',
                'multiple' => true
            ])
//            ->add('relatedActors',EntityType::class,[
//                'required'   => false,
//                'class' => Quote::class,
//                'choice_label' => 'verse',
//                'placeholder' => '',
//                'multiple' => true
//            ])
            ->add('image', FileType::class,
                ['required'   => false,
                    'data' => null])
            ->add('save',SubmitType::class);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SoftUniBlogBundle\Entity\Category'
        ));
    }
}