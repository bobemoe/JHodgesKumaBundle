# JHodgesKumaBundle

Adds various usefull features to the [Kunstmaan Bundles CMS](https://packagist.org/packages/kunstmaan/bundles-standard-edition)
2.x only, untested on 3.x

Install with composer and add the bundle to AppKernel.php

```php
            new JHodges\KumaBundle\JHodgesKumaBundle(),
```            

The following features are provided:

## Change the parent of a Node (Page)

Unfortunately in the admin area it is not possible to change a Nodes parent, sometimes making reordering your content imposable.

Here is a console command to change the parent of a node, you will need to know the parent and child node IDs.

```bash
app/console jhodges:kuma:change-parent child_id parent_id
```

## ContentPage

Various templates for easy layout switching of content pages:

* 1 column
* 2 column with left or right sidebar
* 3 column, sidebars or equal widths

All with header and footer.

## NavigationPagePart

Display a (sidebar) navigation of a nodes children or siblings

* start:
	* 0: top level is Nodes children
	* -1: top level is Nodes siblings
* depth: how many generations deep to recurse

To enable, add the following to the types section of the config/pageparts region that you want to allow a gallery to be added to.

```yml
types:
    - { name: Navigation, class: JHodges\KumaBundle\Entity\PageParts\NavigationPagePart }
```

## TemplateHelper

Returns the nodemenu, page and other variables required for your Kunstmaan style templates and navigations to work with standard Symfony controllers and routing.

To use, create a new content page and set its title, slug, name, nav position etc as you wish.  It makes sense to set the slug so that the URI matches your custom route. Make sure your routing is loaded before the Kunstmaan slug router, then when you click the page in the nav you will actually be take to your custom route, however (assuming your template extends your main Kunstmaan template) the page will be rendered with the correct nav item selected, and title and SEO details from the admin.

```php
$this->get('jhodges.kuma.template')->getVars($slug,$locale,$vars=array())
```

* Specify a $slug and $locale to have the specified page highlighted in the nav use its title etc.
* Optionally also provide $vars array that will be merged in with the kuma vars.

```php
	public function helloAction($name){
		return $this->get('jhodges.kuma.template')->getVars('','en',array(
			'name'=>$name
		));
	}
```

## GalleryPagePart

Allows adding of images to a gallery, currently displays as the default slider, will soon be adding a lightbox style popup gallery template.

To enable, add the following to the types section of the config/pageparts region that you want to allow a gallery to be added to.

```yml
types:
    - { name: Gallery, class: JHodges\KumaBundle\Entity\PageParts\GalleryPagePart }
```

## HTML/iFrame Admin Dashboard

Replacement for the default Google Analytics dashboard.  Useful for those of us who use Piwik or another analytics package.  Simply add the routing, change the dashboard route config variable and add another parameter to your config, with the HTML or iFrame code you want to use on the dashboard:

**routing.yml**
```yml
j_hodges_kuma:
    resource: "@JHodgesKumaBundle/Resources/config/routing.yml"
    prefix:   /
```    

**config.yml**
```yml
kunstmaan_admin:
    dashboard_route: 'jhodges_dashboard'

parameters:
    jhodges.dashboard.html: '<iframe src="http://piwik.domain.co.uk/index.php?module=Widgetize&action=iframe" width="100%" height="2000px"></iframe>'

```
