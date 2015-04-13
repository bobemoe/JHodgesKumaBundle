<?php

namespace JHodges\KumaBundle\Entity\PageParts\PageParts;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImagePopupPagePart
 *
 * @ORM\Table(name="jhodges_kumabundle_image_popup_page_parts")
 * @ORM\Entity
 */
class ImagePopupPagePart extends \Kunstmaan\PagePartBundle\Entity\AbstractPagePart
{
    /**
     * @var string
     *
     * @ORM\Column(name="image_alt_text", type="text", nullable=true)
     */
    private $imageAltText;

    /**
     * @var \Kunstmaan\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="Kunstmaan\MediaBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     * })
     */
    private $image;


    /**
     * Set imageAltText
     *
     * @param string $imageAltText
     * @return ImagePopupPagePart
     */
    public function setImageAltText($imageAltText)
    {
        $this->imageAltText = $imageAltText;

        return $this;
    }

    /**
     * Get imageAltText
     *
     * @return string 
     */
    public function getImageAltText()
    {
        return $this->imageAltText;
    }

    /**
     * Set image
     *
     * @param \Kunstmaan\MediaBundle\Entity\Media $image
     * @return ImagePopupPagePart
     */
    public function setImage(\Kunstmaan\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Kunstmaan\MediaBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the twig view.
     *
     * @return string
     */
    public function getDefaultView()
    {
        return 'JHodgesKumaBundle:PageParts:ImagePopupPagePart/view.html.twig';
    }

    /**
     * Get the admin form type.
     *
     * @return \JHodges\KumaBundle\Form\PageParts\ImagePopupPagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new \JHodges\KumaBundle\Form\PageParts\ImagePopupPagePartAdminType();
    }
}