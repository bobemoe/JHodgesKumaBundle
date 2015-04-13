<?php

namespace JHodges\KumaBundle\Entity\Pages;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentPage
 *
 * @ORM\Table(name="jhodges_kumabundle_content_pages")
 * @ORM\Entity
 */
class ContentPage extends \Kunstmaan\NodeBundle\Entity\AbstractPage implements \Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface
{


	/**
	 * Returns the default backend form type for this page
	 *
	 * @return \JHodges\KumaBundle\Form\Pages\ContentPageAdminType
	 */
	public function getDefaultAdminType()
	{
		return new \JHodges\KumaBundle\Form\Pages\ContentPageAdminType();
	}

	/**
	 * @return array
	 */
	public function getPossibleChildTypes()
	{
		return array(
			array(
				'name' => 'JHContentPage',
				'class'=> 'JHodges\KumaBundle\Entity\Pages\ContentPage'
			),
			array(
				'name'  => 'FormPage',
				'class' => 'LabIT\CMSBundle\Entity\Pages\FormPage'
			),
			array(
				'name'  => 'PostOverviewPage',
				'class' => 'LabIT\CMSBundle\Entity\Post\PostOverviewPage'
			),
			array(
				'name'  => 'PostHomePage',
				'class' => 'LabIT\CMSBundle\Entity\Pages\PostHomePage'
			),
		);
	}

	/**
	 * @return string[]
	 */
	public function getPagePartAdminConfigurations()
	{
		return array(
			'JHodgesKumaBundle:main',
			'JHodgesKumaBundle:left-column',
			'JHodgesKumaBundle:right-column',
			'JHodgesKumaBundle:slider',
			'JHodgesKumaBundle:footer',
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getPageTemplates()
	{
		return array(
			'JHodgesKumaBundle:one-column',
			'JHodgesKumaBundle:one-column-slider',
			'JHodgesKumaBundle:two-column-left',
			'JHodgesKumaBundle:two-column-left-slider',
			'JHodgesKumaBundle:two-column-right',
			'JHodgesKumaBundle:two-column-right-slider',
			'JHodgesKumaBundle:three-column',
			'JHodgesKumaBundle:three-column-slider',
			'JHodgesKumaBundle:three-column-equal',
			'JHodgesKumaBundle:three-column-equal-slider',
		);
	}

	/**
	 * Get the twig view.
	 *
	 * @return string
	 */
	public function getDefaultView()
	{
		return 'JHodgesKumaBundle:Pages:Common/view.html.twig';
	}
}
