<?php

namespace JHodges\KumaBundle\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;

/**
 * NavigationPagePart
 *
 * @ORM\Table(name="jhodges_kumabundle_navigation_page_parts")
 * @ORM\Entity
 */
class NavigationPagePart extends \Kunstmaan\PagePartBundle\Entity\AbstractPagePart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="start", type="integer", nullable=false)
     */
    private $start;

    /**
     * @var integer
     *
     * @ORM\Column(name="depth", type="integer", nullable=false)
     */
    private $depth;


    /**
     * Set start
     *
     * @param integer $start
     * @return NavigationPagePart
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return integer 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set depth
     *
     * @param integer $depth
     * @return NavigationPagePart
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return integer 
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Get the twig view.
     *
     * @return string
     */
    public function getDefaultView()
    {
        return 'JHodgesKumaBundle:PageParts:NavigationPagePart/view.html.twig';
    }

    /**
     * Get the admin form type.
     *
     * @return \JHodges\KumaBundle\Form\PageParts\NavigationPagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new \JHodges\KumaBundle\Form\PageParts\NavigationPagePartAdminType();
    }
}