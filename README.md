
# path.php – Simple Server Path Finder for .htpasswd Setup

![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)

This script helps you quickly identify the **absolute server path** of the current directory, which is essential when configuring `.htpasswd` file protections (e.g., for the `AuthUserFile` directive in `.htaccess`).

## Features
- Displays the **current absolute path** using PHP’s `dirname(__FILE__)`.
- **Copy button** to easily grab the path for further use.
- Clean, dark-themed UI based on Bootstrap (Wemser style™).
- Optional example config section (ideal for `.htaccess` copy-paste snippets).

## Use Cases
- Setting up **.htpasswd authentication** correctly without guessing file paths.
- Perfect for shared hosting environments where absolute paths are not obvious.
- Prevents common mistakes when dealing with server directory structures.

## How to Use
1. Upload **path.php** into the directory you want to inspect.
2. Open the file in your browser.
3. Click **Copy** to grab the full server path.
4. Use this path in your `.htaccess` like:

   ```apache
    AuthUserFile /your/full/server/path/to/.htpasswd
    ```

## Important Notice
- **Delete path.php after use!** (Exposing directory structures publicly is a security risk.)

## License
This project is licensed under the **GNU General Public License v3.0 (GPLv3)** – see the [LICENSE](LICENSE) file for details.
