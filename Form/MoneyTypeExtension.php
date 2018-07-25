<?php
namespace Delatlantik\RichFormSymfonyBundle\Form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class MoneyTypeExtension
 * @package Delatlantik\RichFormSymfonyBundle\Form
 */
class MoneyTypeExtension extends AbstractTypeExtension
{

    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType(): string
    {
        return MoneyType::class;
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
        } else {
            $view->vars['ico'] = 'money';
        }
    }
}
