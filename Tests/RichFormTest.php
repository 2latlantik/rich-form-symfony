<?php
namespace Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Delatlantik\RichFormSymfonyBundle\Tests\App\AppKernel;

/**
 * Class RichFormTest
 * @package Tests
 */
class RichFormTest extends WebTestCase
{

    /**
     * @var $formBuilder
     */
    protected $formBuilder;

    /**
     * @var $twig
     */
    protected $twig;

    protected function setUp()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $this->formBuilder = $kernel
            ->getContainer()
            ->get('form.factory')
            ->createBuilder();
        $this->twig = self::$kernel
            ->getContainer()
            ->get('twig');
    }

    public function testWithTextType(): void
    {
        $form = $this->formBuilder
            ->add('input', TextType::class, [
                'ico' => 'pencil'
            ])
            ->getForm();

        $html = $this->twig
            ->render('view.html.twig', array(
                'form' => $form->createView()
            ));

        $reference = '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></span></div><input type="text" id="form_input" name="form[input]" required="required" class="form-control" /></div>';

        $this->assertEquals($reference, trim($html));
    }

    public function testWithMoneyType()
    {

        $form = $this->formBuilder
            ->add('input', MoneyType::class, [
                'ico' => 'money'
            ])
            ->getForm();

        $html = $this->twig
            ->render('view.html.twig', array(
                'form' => $form->createView()
            ));

        $reference = '<div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span></div><input type="text" id="form_input" name="form[input]" required="required" class="form-control" /><div class="input-group-append"><span class="input-group-text"> €</span></div></div>';

        $this->assertEquals($reference, trim($html));
    }

    public function testWithTextAreaType()
    {
        $form = $this->formBuilder
            ->add('input', TextareaType::class, [
                'ico' => 'pencil'
            ])
            ->getForm();
        $html = $this->twig
            ->render('view.html.twig', array(
                'form' => $form->createView()
            ));

        $reference = '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></span></div><textarea id="form_input" name="form[input]" required="required" class="form-control"></textarea></div>';

        $this->assertEquals($reference, trim($html));
    }

    public function testWithChoiceType()
    {
        $form = $this->formBuilder
            ->add('input', ChoiceType::class, [
                'expanded' => false,
                'ico' => 'pencil'
            ])
            ->getForm();
        $html = $this->twig
            ->render('view.html.twig', array(
                'form' => $form->createView()
            ));

        $reference = '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></span></div><select id="form_input" name="form[input]" class="form-control"></select></div>';

        $this->assertEquals($reference, trim($html));
    }

    protected static function getKernelClass()
    {
        return AppKernel::class;
    }

    protected static function createKernel(array $options = array())
    {
        return self::$kernel = new AppKernel('test', true);
    }
}
