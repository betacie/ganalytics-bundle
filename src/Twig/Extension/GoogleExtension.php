<?php

namespace Betacie\Bundle\GoogleBundle\Twig\Extension;

use Betacie\Google\Analytics;

class GoogleExtension extends \Twig_Extension
{

    private $analytics;

    public function __construct(Analytics $analytics)
    {
        $this->analytics = $analytics;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('google_analytics', array($this, 'renderAnalytics'), array('is_safe' => array('html' => true))),
            new \Twig_SimpleFunction('google_events', array($this, 'renderEvents'), array('is_safe' => array('html' => true))),
        );
    }

    public function getName()
    {
        return 'betacie_google_extension';
    }

    public function renderAnalytics()
    {
        return $this->analytics->render();
    }

    public function renderEvents()
    {
        return $this->analytics->getTracker()->render();
    }
}