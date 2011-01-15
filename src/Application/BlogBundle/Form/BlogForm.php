<?php

namespace Application\BlogBundle\Form\BlogForm;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\TextField;
use Symfony\Component\Form\RepeatedField;
use Symfony\Component\Form\PasswordField;

use Symfony\Component\Validator\ValidatorInterface;

class BlogForm extends Form
{
    /**
     * Constructor.
     *
     * @param string $name
     * @param array|object $data
     * @param ValidatorInterface $validator
     * @param array $options
     */
    public function __construct($title, $data, ValidatorInterface $validator, array $options = array())
    {
        $this->addOption('theme');

        parent::__construct($title, $data, $validator, $options);
    }

    public function configure()
    {
        $this->add(new TextField('name'));
        $this->add(new TextField('body'));
    }
}
