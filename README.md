
# ShortcodeAnyfile
Omeka shortcode to insert an image anywhere  you can setup a shortcode. The image can come from an item or from the images directory in your theme. The purpose of this shortcode is to allow you to insert any image uploaded to the images directory of your theme as well as images from items in simple pages or exhibits. 

If the image file comes from an item, it can link back to the image file or to the item.

The shortcode take the following parameters:

width:  String | Display width of the image. You should include either px for
 	pixels or % for percent of width.
height: String | Display height of the image.Yeu should include either px for
	pixels or % for percent of height
img:	Boolean | Whether to display an image from the "images" directory of
	your theme (true) or to display it as an image file connected to an
	item (false). If img == true, then the value of lid parameter should
	be a string with the filename of the file in the images directory.
	If img == false or you don't set this parameter, then the lid
	parameter should be the id of the file (not the id of the item the
	file is in.
anchor: String | How to link the image to either the file or the item the
	file is in. If anchor == file, the image will link to the file; if 
	anchor == item, the image will link to the item that the file belongs
	to. If anchor is any other value, there will be no link. The 
	default is no link. If img = true this values is not used. Files
	in the images directory will have no link.
lid:	The id of the file (numeric) or a string of the filename of the file
	in the images directory of your theme.

A possible shortcode for a file in the images directory would look like this:

[anyfile lid="filename.jpg" img=true width="200px"]

For a file in an item with an id of 299 linking back to the item:

[anyfile lid=299 anchor="item" width="200px"]

An image file linking to the image:

[anyfile lid=299 anchor="file" width="200px"]

An image file with no links:

[anyfile lid=299 width="200px"]
