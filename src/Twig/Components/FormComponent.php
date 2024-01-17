<?php

namespace App\Twig\Components;

use App\Form\ExampleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class FormComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(updateFromParent: true)]
    public string $initialFormData = '';

    #[LiveProp]
    public array $countInstantiateFormCalls = [];

    protected function instantiateForm(): FormInterface
    {
        $this->countInstantiateFormCalls[] = $this->initialFormData;
        return $this->createForm(ExampleType::class, ['text' => $this->initialFormData]);
    }
}