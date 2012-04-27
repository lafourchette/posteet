<?php

namespace LF\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('LFMainBundle:Default:index.html.twig');
    }

    public function adminAction()
    {
        return $this->render('LFMainBundle:Default:admin.html.twig');
    }
	
}
