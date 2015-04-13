# JHodgesKumaBundle

Adds various features to the KunstmaanBundles

## Change the parent of a Page (Node)

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

start:
	0: top level is Nodes children
	-1: top level is Nodes siblings
depth: how many generations deep to recurse

## TemplateHelper

Merges in the nodemenu, page and other variables required for your templates to work with standard Symfony controllers and routing.

Specify a page slug and locale to have the specified page highlighted in the nav use its title etc.

```php
	public function helloAction($name){
		return $this->get('jhodges.kuma.template')->getVars('','en',array(
			'name'=>$name
		));
	}
```

## ImagePopupPagePart

TODO: Select an Image and have a thumbnail generated, when clicked lightbox popup, cycle through gallery.
