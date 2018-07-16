<?php
namespace Tests;

use Delatlantik\RichFormSymfonyBundle\Form\InputTypeExtension;
use Delatlantik\RichFormSymfonyBundle\Tests\App\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\Forms;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class RichFormTest extends WebTestCase
{
    public function testPremier() {

       // $client = static::createClient();

        $kernel = $this->createKernel();
        $kernel->boot();

        //$formBuilder = $kernel->getContainer()->get('form.factory')->createBuilder('form');

        $formFactory = Forms::createFormFactoryBuilder()
            ->getFormFactory();
        $formBuilder = $formFactory->createBuilder();
        $formBuilder->add('input', InputTypeExtension::class, ['data_class' => 'ABC']);

        $form = $formBuilder->getForm();

        $kernel->getContainer()->get('twig');
    /*
        $twig = new Environment(new FilesystemLoader(array(



        )));*/
    }

    protected static function getKernelClass()
    {
        return AppKernel::class;
    }

    static protected function createKernel(array $options = array())
    {
        return self::$kernel = new AppKernel('test', true);
    }
}