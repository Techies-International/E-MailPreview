<?php

class Hackathon_EmailPreview_Model_Mail_Type_Contact
{
    const TYPE_CONTACT = 'test_contact_email_template';
    /**
     * @param Varien_Event_Observer $observer
     * @return Hackathon_EmailPreview_Model_Mail_Type_Contact
     */
    public function hackathonEmailpreviewRenderEmailBefore(Varien_Event_Observer $observer)
    {
        if (self::TYPE_CONTACT !== $observer->getEvent()->getData('templateType')) {
            return $this;
        }

        $templateParams = $observer->getEvent()->getData('templateParams');
        $requestParams = $templateParams->getRequestParams();
        $name = $requestParams['fromName'];
        $email = $requestParams['fromEmail'];
        $telephone = $requestParams['fromTelephone'];
        $comment = $requestParams['message'];

        $data = new Varien_Object();
        $data->setName($name);
        $data->setEmail($email);
        $data->setTelephone($telephone);
        $data->setComment($comment);

        $templateParams->setData('data', $data);


        return $this;
    }
}
