# Ultimate Member - User Tags - Import from CSV

Adds a widget for importing User Tags from the CSV file.

## Key features
- Adds the "User Tags Importing" widget to the WordPress dashboard.
- Allows importing User Tags from the CSV file.

## Installation

__Note:__ This plugin requires the [Ultimate Member](https://wordpress.org/plugins/ultimate-member/) plugin and [User Tags](https://ultimatemember.com/extensions/user-tags/) extension to be installed first.

### How to install from GitHub

Open git bash, navigate to the **plugins** folder and execute this command:

`git clone --branch=main git@github.com:umdevelopera/um-user-tags-import.git um-user-tags-import `

Once the plugin is cloned, enter your site admin dashboard and go to _wp-admin > Plugins > Installed Plugins_. Find the **Ultimate Member - User Tags - Import from CSV** plugin and click the **Activate** link.

### How to install from ZIP archive

You can install this plugin from the [ZIP file](https://drive.google.com/file/d/1kpewCjPEt6W0kHsGlcMd1klYJk5Jc79F/view?usp=sharing) as any other plugin. Follow [this instruction](https://wordpress.org/support/article/managing-plugins/#upload-via-wordpress-admin).

## How to use

To use this tool you should create the CSV file with three columns:
1. **Parent term** - the parent tag "Name" for the child tag, the tag "Name" for the parent tag.
2. **Description** - the tag "Description". You may leave this column empty.
3. **User tag** - the tag "Name".

![example](https://github.com/umdevelopera/um-user-tags-import/assets/113178913/59e02038-6f3b-4f29-8ade-e17473133773)

You have to use a real CSV file with the comma delimiter.

### CSV file examples

#### Example 01 - minimal.
<pre>
Parent term,Description,User tag
Colors,,
,,Red
,,Green
,,Blue
</pre>

#### Example 02 - recommended.
<pre>
Parent term,Description,User tag
Colors,Your favorite colors,Colors
Colors,,Red
Colors,,Green
Colors,,Blue
</pre>

#### Example 03 - multiple user tag fields.
<pre>
Parent term,Description,User tag
Colors,Your favorite colors,Colors
Colors,,Red
Colors,,Green
Colors,,Blue  
Pets,Your favorite pets,Pets
Pets,,Cat
Pets,,Dog
Pets,,Bird
</pre>

### Widget
- go to WordPress Dashboard and look for the "User Tags Importing" widget.
- upload your CSV file in the field "Source CSV file".
- click the "Import" button.

Image - Upload CSV file and import tags.
![WP Dashboard + User Tags Importing 01](https://user-images.githubusercontent.com/113178913/192280281-2770a8d6-f68c-489a-8c9e-1fc5a98a172f.png)

Image - Importing notice.
![WP Dashboard + User Tags Importing 02](https://user-images.githubusercontent.com/113178913/192282291-f9d24639-74a9-405c-ac5c-6c1ab4211bb8.png)

## Support

This is a free extension created for the community. The Ultimate Member team does not provide support for this extension.
Open new [issue](https://github.com/umdevelopera/um-user-tags-import/issues) if you are facing a problem or have a suggestion.

## Related links

Ultimate Member home page: https://ultimatemember.com/

Ultimate Member documentation: https://docs.ultimatemember.com/

Ultimate Member on wordpress.org: https://wordpress.org/plugins/ultimate-member/

Article: [Ultimate Member - User Tags](https://ultimatemember.com/extensions/user-tags/)
