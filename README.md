# Image Gallery

A super simple image gallery for your webcomic, photos, and more. Inspired + dummy data by XKCD. Written in PHP. Open an Issue if you use this software if you want it to be featured here! It's not open source because I'm stingy. Read the license.

Here's a preview of what it looks like. Feel free to customize the CSS!

<img src="https://github.com/fakerybakery/imagegallery/assets/76186054/6d221709-a0c8-4e3c-8ff5-7850476382d5" width="300">

## Features

* No databases
* PHP-based
* Includes RSS feed
* Includes OG/Meta tags

## Get Started

Copy all ".php" and ".css" files to your server. Create `alt`, `image`, and `title` directories. Edit the `config.php` file with your details. Set the `license` field to the license of your images.

Need dummy data? Run `python3 download-xkcd.py`! Just make sure to comply with XKCD's license.

When you have a new image, name it `0.png`, `1.png`, `2.png`, etc and place them in the `image` folder. Create files `0.txt`, `1.txt`, `2.txt`, etc and place them in the `title` folder. These will be the titles of the images you place in the `image` folder under the same filename. Optionally, you can also create `.txt` files in the `alt` directory to add captions.

## Todo

* JSON API
* Email Newsletter? (Might not work due to how this software works)

## FAQs

### Is this open sourced?

Nope! Basically, I'm stingy so this software is not technically open-sourced. Read the license! If you want an exception, please email me. It's probably fine, I'm just a bit stingy...

### Does this require a database?

Nope! This software is 100% database-free!

### Does this support PHP ...?

I haven't extensively tested this on different PHP versions. But the code is pretty simple so it shouldn't be that hard to fix it for older/newer versions. I'm testing it on PHP 7.4.

## License

**TL;DR:** Don't remove the attribution, and don't make over $1k from tips/donations/ads, etc (not a replacement for the license)

Permission is granted to any person obtaining a copy of this software to use it without restriction, so long as the following conditions are met:

* Original and modified portions of this software may not be redistributed in source or binary forms without prior written permission from the authors.
* Any attribution contained in this software may not be hidden or modified without prior permission from the authors.
* This software may be used in "low-profit" environments, meaning that the user may use this software with advertisements, donations, tips, and other commercial components, however they must remove all commercial components, including tips, advertisements, donations, and any other components within 24 hours if the sum of the total income from all components exceeds USD $1,000 in any given 30-day period.

This software comes with no warranty whatsoever, expressed or implied, including but limited to the warranties of fitness and merchantability. In no event shall the author be liable for any damages, in contract, tort, or otherwise, arising from, out of, or in connection with use or dealings with this software.

**If you want an exception, please email me. It's probably fine, I'm just a bit stingy...**

## Contributions

By submitting contributions to this project, you grant the authors and maintainers of this software the right to use, modify, distribute, sublicense, and otherwise deal with your contributions, including incorporating them into the software at their discretion. You also affirm that your contributions do not infringe on any third-party rights, and you have the necessary permissions to grant these rights.

Your contributions will be subject to the licensing terms determined by the authors and maintainers of this project. You acknowledge that the authors may choose to apply and/or change a license in the future that may differ from the current terms.
