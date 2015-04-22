<?php

namespace JHodges\KumaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{

    /**
     * The index action will render the main screen the users see when they log in in to the admin
     *
     * @Route("/", name="jhodges_dashboard")
     * @Template()
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function indexAction(Request $request, $segmentId=null)
    {
        $html=$this->container->getParameter('jhodges.dashboard.html');
        return $this->render('JHodgesKumaBundle:Dashboard:index.html.twig', array('html'=>$html));
    }
}
