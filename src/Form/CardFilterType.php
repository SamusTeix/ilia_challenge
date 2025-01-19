<?php

namespace App\Form;

use App\Helper\Helper;
use App\Service\RarityService;
use App\Service\SubtypeService;
use App\Service\SupertypeService;
use App\Service\TypeService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardFilterType extends AbstractType
{
    public function __construct(
        private readonly RarityService $rarityService,
        private readonly TypeService $typeService,
        private readonly SubtypeService $subtypeService,
        private readonly SupertypeService $supertypeService
    ) {}

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, [
                'label' => 'ID',
                'required' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'Nome',
                'required' => false,
            ])
            ->add('abilities', TextType::class, [
                'label' => 'Habilidade',
                'required' => false,
            ])
            ->add('attacks', TextType::class, [
                'label' => 'Ataque',
                'required' => false,
            ])
            ->add('rarity', ChoiceType::class, [
                'label' => 'Raridade',
                'choices' => Helper::createFormOptionsByArray($this->rarityService->index()),
                'required' => false,
            ])
            ->add('resistances', TextType::class, [
                'label' => 'Resistência',
                'required' => false,
            ])
            ->add('types', ChoiceType::class, [
                'label' => 'Tipo',
                'choices' => Helper::createFormOptionsByArray($this->typeService->index()),
                'required' => false,
            ])
            ->add('subtypes', ChoiceType::class, [
                'label' => 'Subtipo',
                'choices' => Helper::createFormOptionsByArray($this->subtypeService->index()),
                'required' => false,
            ])
            ->add('supertype', ChoiceType::class, [
                'label' => 'Supertipo',
                'choices' => Helper::createFormOptionsByArray($this->supertypeService->index()),
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
        ]);
    }
}
