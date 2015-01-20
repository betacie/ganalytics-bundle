<?php

namespace Betacie\Bundle\GoogleBundle\Twig\Extension;

use Betacie\Google\Tracker\TrackerInterface;

class GoogleExtension extends \Twig_Extension
{

    private $tracker;

    public function __construct(TrackerInterface $tracker)
    {
        $this->tracker = $tracker;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('google_track', array($this, 'track'), array('is_safe' => array('html' => true))),
        );
    }

    public function getName()
    {
        return 'betacie_google_extension';
    }

    public function track()
    {
        return $this->tracker->render();
    }

}