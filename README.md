# Akyos Blocks for Sage Theme

A composer library for WordPress Sage Theme that adds the ability to import Gutenberg Blocks created with ACF into your theme.

## Overview

This library allows you to seamlessly integrate ACF-based Gutenberg Blocks into your Sage theme. It simplifies managing block assets and enables you to override block views directly within your theme.

## Features

- **Block Import:** Easily import Gutenberg Blocks configured via a JSON file.
- **Asset Management:** Import SCSS and JS assets and automatically add dependencies to your `package.json`.
- **View Overrides:** Copy block view files into your theme for customization.
- **Service Initialization:** Automatically registers the required service through the `AkyosServiceProvider.php` in your template theme.

## Installation

1. **Install the Composer Library:**

   Ensure you have Composer installed, then add the library to your project: ```composer require akyos/blocks```


2. **Create the Configuration File:**

At the root of your Sage theme, create a file named `akyos-blocks.json`. This file should be a JSON object mapping block categories to block slugs. For example:
```
{
  "hero": "hero1",
  "map": "map1"
} 
```


## Setup

The library is initialized via the `AkyosServiceProvider.php` file, which is included in your template theme. Ensure that this service provider is correctly registered so that the library is properly bootstrapped.

## Usage

Once installed and configured, you can manage block assets and overrides using WP Acorn commands.

### Import Block Assets

```wp acorn import:block:assets``` 
- This command imports the necessary SCSS and JS files for your blocks by copying them into your theme and updating your `package.json` with the required dependencies.
- **Prompt:** The command will ask for the slug of the block you want to import assets for. Enter a specific block slug or `-1` to import assets for all blocks.

### Override Block View

```wp acorn override:block```
- This command copies the view file of a specific block into your theme, allowing you to customize the block's output.

- **Prompt:** The command will ask for the slug of the block you wish to override. Provide the slug to copy the block's view file to your theme.

## Contributing

Contributions are welcome! If you have suggestions or improvements, feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

Happy coding!



