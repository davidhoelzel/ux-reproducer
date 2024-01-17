<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class ProviderComponent
{
    use DefaultActionTrait;

    #[LiveProp]
    public string $randomString = '';

    #[LiveAction]
    public function generate(): void
    {
        $this->randomString = md5((string) mt_rand(0, 1000));
    }
}