<?php

namespace FroshCodemirror;

use Shopware\Components\Plugin;

class FroshCodemirror extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Base' => 'onPostDispatchBackendBase',
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex',
        ];
    }

    public function onPostDispatchBackendIndex(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Backend_Index $subject */
        $subject = $args->getSubject();


        if ($subject->Request()->getActionName() === 'index') {
            $subject->View()->addTemplateDir($this->getPath() . '/Resources/views');
            $subject->View()->extendsTemplate('backend/codemirror_css.tpl');
        }
    }

    public function onPostDispatchBackendBase(\Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Backend_Base $subject */
        $subject = $args->getSubject();

        if ($subject->Request()->getActionName() === 'index') {
            $subject->View()->addTemplateDir($this->getPath() . '/Resources/views');
            $subject->View()->extendsTemplate('backend/tinymce.js');
        }
    }
}
