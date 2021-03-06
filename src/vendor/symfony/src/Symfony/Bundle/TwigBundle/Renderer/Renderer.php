<?php

namespace Symfony\Bundle\TwigBundle\Renderer;

use Symfony\Component\Templating\Renderer\Renderer as BaseRenderer;
use Symfony\Component\Templating\Storage\Storage;
use Symfony\Component\Templating\Engine;
use Symfony\Bundle\TwigBundle\GlobalVariables;

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @author Fabien Potencier <fabien.potencier@symfony-project.com>
 */
class Renderer extends BaseRenderer
{
    protected $environment;

    public function __construct(\Twig_Environment $environment, GlobalVariables $globals)
    {
        $this->environment = $environment;

        $environment->addGlobal('app', $globals);
    }

    /**
     * Evaluates a template.
     *
     * @param Storage $template   The template to render
     * @param array   $parameters An array of parameters to pass to the template
     *
     * @return string|false The evaluated template, or false if the renderer is unable to render the template
     */
    public function evaluate(Storage $template, array $parameters = array())
    {
        return $this->environment->loadTemplate($template)->render($parameters);
    }
}
