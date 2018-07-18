<?php
namespace Tests;

use Delatlantik\RichFormSymfonyBundle\Form\InputTypeExtension;
use Delatlantik\RichFormSymfonyBundle\Tests\App\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $formBuilder->add('input', TextType::class, [
            'ico' => 'pencil'
        ]);

        $form = $formBuilder->getForm();

        $html = $kernel
            ->getContainer()
            ->get('twig')
            ->render('view.html.twig', array(
                'form' => $form->createView()
            ));
        var_dump($html);
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