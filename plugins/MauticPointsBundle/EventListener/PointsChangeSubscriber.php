<?php

namespace MauticPlugin\MauticPointsBundle\EventListener;

use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\LeadBundle\Event as Events;
use Mautic\LeadBundle\LeadEvents;
use Mautic\LeadBundle\Model\LeadModel;

class PointsChangeSubscriber extends CommonSubscriber
{

    static public function getSubscribedEvents()
    {
        return array(
            LeadEvents::LEAD_POINTS_CHANGE     => array('onLeadPointsChange', 0),
        );
    }

    public function onLeadPointsChange(LeadEvent $event)
    {
        $lead = $event->getLead();
        $newPoints = $event->getNewPoints();

        $leadModel = $this->factory->getModel('lead');
        $leadModel->setCurrentLead($lead);

        $leadFields = array('lead_score' => $newPoints);

        $leadModel->setFieldValues($lead, $leadFields);
        $leadModel->saveEntity($lead);
    }
}