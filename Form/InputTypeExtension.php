<?php
namespace Delatlantik\RichFormSymfonyBundle\Form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InputTypeExtension
 * @package Delatlantik\RichFormSymfonyBundle\Form
 */
class InputTypeExtension extends AbstractTypeExtension
{

    /**
     * @var string
     */
    private $bootstrap_version;

    public function __construct($bootstrap_version)
    {
        $this->bootstrap_version = $bootstrap_version;
    }

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        return [TextType::class];
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefined(['ico']);
    }

    /**
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        if (isset($options['ico'])) {
            $view->vars['ico'] = $options['ico'];
        }
        $view->vars['bootstrap_version'] = $this->bootstrap_version;
    }
}
