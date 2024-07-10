# ultimate-image-slider
Easily create and customize beautiful, responsive image slideshows for your WordPress site.

# Ultimate Image Slider

Ultimate Image Slider is a WordPress plugin that allows you to create a beautiful image slideshow using a shortcode. It provides an easy-to-use admin interface for adding, removing, and reordering images.

## Features

- Admin-side settings page for managing images.
- Drag-and-drop functionality to reorder images.
- Shortcode `[myslideshow]` to display the image slideshow on any page.
- Uses jQuery for the slideshow functionality.

## Installation

1. Clone the repository to your WordPress plugins directory:
    ```bash
    git clone https://github.com/beyond88/ultimate-image-slider.git
    ```
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. Go to the Ultimate Image Slider settings page in the WordPress admin area.
2. Add or remove images and reorder them using drag-and-drop functionality.
3. Use the shortcode `[myslideshow]` on any page or post to display the image slideshow.

## Coding Standards

- Follows WordPress coding standards.
- Uses WordPress core CSS/JS for the UI.
- Responsive design to ensure compatibility with mobile devices.

## Development

### Directory Structure

- **.circleci**: Configuration files for CircleCI.
- **assets**: Static assets like images and stylesheets.
- **bin**: Executable scripts.
- **build**: Build scripts and tools.
- **includes**: PHP files for core plugin functionality.
- **languages**: Translation files.
- **tests**: Unit tests for the plugin.
- **vendor**: Composer dependencies.

### Files

- **.gitignore**: Specifies files to ignore in the repository.
- **.phpcs.xml**: PHP Code Sniffer configuration.
- **.phpunit.result.cache**: PHPUnit result cache.
- **composer.json**: Composer configuration.
- **composer.lock**: Composer lock file.
- **phpunit.xml**: PHPUnit configuration.
- **README.md**: This file.
- **ultimate-image-slider.php**: Main plugin file.
- **uninstall.php**: Uninstall script.

## Unit Testing

- The plugin includes unit tests that can be run using PHPUnit.
- To set up unit testing, use wp-cli.


## License

This project is licensed under the GPL3 License - see the [LICENSE](LICENSE) file for details.

## Demo

[Demo Link](https://products.thebitcraft.com/my-slide-show/)


## Libraries Used

- [jQuery UI Sortable](http://jqueryui.com/demos/sortable/#connect-lists)
- [slick.js](https://kenwheeler.github.io/slick/)
