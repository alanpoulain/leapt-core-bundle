<?php

declare(strict_types=1);

namespace Leapt\CoreBundle\Twig\Node;

use Twig\Attribute\YieldReady;
use Twig\Compiler;
use Twig\Node\Node;

#[YieldReady]
class PaginatorThemeNode extends Node
{
    public function __construct(Node $paginator, Node $resources, $lineno, $tag = null)
    {
        parent::__construct(['paginator' => $paginator, 'resources' => $resources], [], $lineno, $tag);
    }

    public function compile(Compiler $compiler): void
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$this->env->getExtension(\'Leapt\CoreBundle\Twig\Extension\PaginatorExtension\')->setTheme(')
            ->subcompile($this->getNode('paginator'))
            ->raw(', ')
            ->subcompile($this->getNode('resources'))
            ->raw(");\n");
    }
}
