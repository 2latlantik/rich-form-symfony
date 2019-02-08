<?php
namespace Delatlantik\RichFormSymfonyBundle\Form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTypeExtension extends AbstractTypeExtension
{

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        return [DateType::class];
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
    }
}
