<?php

namespace Application\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\TextField;
use Symfony\Component\Form\IntegerField;
use Application\BlogBundle\Entity\Article;
use Application\BlogBundle\Form\BlogForm;
//use Symfony\Component\Validator\Constraints\Locale;

class DefaultController extends Controller
{
    public function indexAction()
    {
      $em = $this->get('doctrine.orm.entity_manager');
      $articles = $em->getRepository('BlogBundle:Article')->findAll();

      return $this->render('BlogBundle:Default:index.php', array('articles' => $articles));
    }

    public function newAction()
    {
      $form = new Form('article', new Article(), $this->get('validator'));
      $form->add(new TextField('name'));
      $form->add(new TextField('body'));

      return $this->render('BlogBundle:Default:new.php', array('form' => $form));
    }
    public function createAction()
    {
        $user = new Article();
        $user->setName('Jonathan H. Wage');
        $user->setBody('Jonathan H. Wage');
        $user->setType(Article::BLOG_OPEN);

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();
    }

    /**
     * Create a UserForm instance and returns it
     *
     * @param User $object
     * @return Application\UserBundle\Form\UserForm
     */
    protected function createForm($object = null)
    {
        $form = $this->get('doctrine.orm.entity_manager');
        if (null === $object) {
            $object = new Article();
        }
        $form->setData($object);

        return $form;
    }
}
