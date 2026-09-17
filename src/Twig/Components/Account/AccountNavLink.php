<?php

namespace App\Twig\Components\Account;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class AccountNavLink
{
    public ?string $route = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?string $icon = null;
}
