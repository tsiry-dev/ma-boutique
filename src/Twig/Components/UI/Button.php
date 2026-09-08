<?php

namespace App\Twig\Components\UI;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Button
{
    public string $variant = 'primary';

    public string $size = 'md';

    public string $type = 'button';

    public string $tag = 'button';
}
