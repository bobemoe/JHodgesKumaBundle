# JHodgesKumaBundle

Adds various usefull features to the [Kunstmaan Bundles CMS](https://packagist.org/packages/kunstmaan/bundles-standard-edition)
2.x only, untested on 3.x

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

All with optional top slider and footer.

## NavigationPagePart

Display a (sidebar) navigation of a nodes children or siblings

* start:
	* 0: top level is Nodes children
	* -1: top level is Nodes siblings
* depth: how many generations deep to recurse

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

## ImagePopupPagePart

TODO: Select an Image to display as a thumbnail, when clicked lightbox popup, cycle through gallery.
