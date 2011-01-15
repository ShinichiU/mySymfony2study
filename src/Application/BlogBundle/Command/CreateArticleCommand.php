<?php

namespace Application\BlogBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Bundle\FrameworkBundle\Command\Command;
use Doctrine\DBAL\Event\Listeners\MysqlSessionInit;

use Application\BlogBundle\Entity\Article;

class CreateArticleCommand extends Command
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('blogbundle:create-article')
        ;
    }

    /**
     * @see Command
     *
     * @throws \InvalidArgumentException When namespace doesn't end with Bundle
     * @throws \RuntimeException         When bundle can't be executed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $em->getEventManager()->addEventSubscriber(new MysqlSessionInit('utf8', 'utf8_unicode_ci'));

        $article = new Article();
        $article->setBody('ああああああああ');
        $article->setName('ああああああああ');
        $article->setType(2);

        $em->persist($article);
        $em->flush();

    }
}
