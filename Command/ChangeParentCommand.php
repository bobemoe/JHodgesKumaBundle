<?php
namespace JHodges\KumaBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ChangeParentCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('jhodges:kuma:change-parent')
            ->setDescription('Change the parent of a Node')
            ->addArgument(
                'child',
                InputArgument::REQUIRED,
                'ID of child not that will be moved'
            )
            ->addArgument(
                'parent',
                InputArgument::REQUIRED,
                'ID of parent Node to move child to'
            )            
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em=$this->getContainer()->get('doctrine')->getManager();

        $child=$em->getRepository('KunstmaanNodeBundle:Node')->find($input->getArgument('child'));
        $parent=$em->getRepository('KunstmaanNodeBundle:Node')->find($input->getArgument('parent'));

        $child->setParent($parent);

        $em->persist($child);
        $em->flush();

        $output->writeln('Done.');
    }
}
