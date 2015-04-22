<?php

namespace JHodges\KumaBundle\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Kunstmaan\WebsiteBundle\Entity\ContactInfo;
use Symfony\Component\Validator\Constraints as Assert;
use Kunstmaan\AdminBundle\Entity\DeepCloneInterface;
/**
 * ContactPagePart
 *
 * @ORM\Table(name="jhodges_kumabundle_gallery_page_part")
 * @ORM\Entity
 */
class GalleryPagePart extends \Kunstmaan\PagePartBundle\Entity\AbstractPagePart implements DeepCloneInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="\JHodges\KumaBundle\Entity\GalleryImage", mappedBy="galleryPagePart", cascade={"persist", "remove"}, orphanRemoval=true)
     **/
    private $images;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }
   
    /**
     * When cloning this entity, we must also clone all entities in the ArrayCollection
     */
    public function deepClone()
    {
        $images = $this->getImages();
        $this->images = new ArrayCollection();
        foreach ($images as $image) {
            $cloneImage = clone $image;
            $this->addImage($cloneImage);
        }
    }

    /**
     * Get the twig view.
     *
     * @return string
     */
    public function getDefaultView()
    {
        return 'JHodgesKumaBundle:PageParts:GalleryPagePart/view.html.twig';
    }

    /**
     * Get the admin form type.
     *
     * @return \JHodges\KumaBundle\Form\PageParts\GalleryPagePartAdminType
     */
    public function getDefaultAdminType()
    {
        return new \JHodges\KumaBundle\Form\PageParts\GalleryPagePartAdminType();
    }

    /**
     * Set title
     *
     * @param string $title
     * @return GalleryPagePart
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add images
     *
     * @param \JHodges\KumaBundle\Entity\GalleryImage $images
     * @return GalleryPagePart
     */
    public function addImage(\JHodges\KumaBundle\Entity\GalleryImage $images)
    {
        $this->images[] = $images;

        $images->setGalleryPagePart($this);

        return $this;
    }

    /**
     * Remove images
     *
     * @param \JHodges\KumaBundle\Entity\GalleryImage $images
     */
    public function removeImage(\JHodges\KumaBundle\Entity\GalleryImage $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * @param ArrayCollection $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }
}
