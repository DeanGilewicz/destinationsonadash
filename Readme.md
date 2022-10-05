<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h2 align="center">🌍 Destinations On A Dash 🗺</h2>
  <p align="center">
    A WordPress Application!
  </p>
</div>

<br />

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#deployment">Deployment</a></li>
  </ol>
</details>

<br />

## About The Project

This application powers the Destinations On A Dash website, which provides travel expertise about places all around the world.

The site provides a map that displays the various places traveled, blog posts about places visited and food eaten, along with itineraries highlighting the various things to do both on and off the beaten path.

There were several reasons for working on this project, including the chance to:

- work with WordPress
- create a development pipeline via Gulp
- implement styles using Foundation and SASS
- use jQuery

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### **Built With**

Below is a list of the major pieces of the tech stack that were used for this application.

- [![WordPress][wordpress]][wordpress-url]
- [![Gulp][gulp]][gulp-url]
- [![Foundation][foundation]][foundation-url]
- [![SASS][sass]][sass-url]
- [![jQuery][jquery]][jquery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<br />

## Getting Started

The following information will provide you with the details necessary to get the application up and running locally.

### **Prerequisites**

Since this application pertains to the `wp-content` folder and tooling to build the custom `destinationsonadash` theme, you'll first need to download [WordPress](https://wordpress.org/) and then copy over all files and folders that do not conflict with the code for this project.

Next you'll want to ensure that [NodeJS](https://nodejs.org/en/) version `16.13.2` is installed on your operating system of choice. It is recommended that a Node Version Manager be used, such as [NVM](https://github.com/nvm-sh/nvm). When installing `NodeJS` this way, the correctly associated `npm` version should automatically be installed.

```sh
nvm install node@16.13.2
```

You'll also need server software to run `Apache` (web server) and `MySQL` (DB server), the default setup for WordPress sites. [MAMP (mac)](https://www.mamp.info/en/mamp-pro/mac/) or [MAMP (windows)](https://www.mamp.info/en/mamp-pro/windows/) can provide a local environment to handle both these needs.

It's also recommended to download a `MySQL` GUI, such as [SequelPro](https://sequelpro.com/) or [MySQL Workbench](https://www.mysql.com/products/workbench/) to more easily interface with the database. Once installed, and DB server is running, you can create a new local connection similar to the below:

```sh
host: 127.0.0.1
root: root
password: root
```

Once a connection is made, you can create your local database according to your [wp-config](https://developer.wordpress.org/apis/wp-config-php/).

### **Installation**

Once `NodeJS` and `npm` are installed you can follow these steps:

1. Clone the repo
   ```sh
   git clone https://github.com/DeanGilewicz/destinationsonadash.git
   ```
2. Install NPM packages
   ```sh
   npm i
   ```
3. Run Gulp to populate vendor files
   ```sh
   gulp initial
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<br />

## Usage

To avoid redirects while working locally you need to comment out the following in `.htaccess`:

```sh
# RewriteCond %{SERVER_PORT} 80
# RewriteRule ^(.*)$ https://www.destinationsonadash.com/$1 [R=301,L]

# RewriteCond %{HTTP_HOST} ^destinationsonadash.com [nocase]
# RewriteRule ^(.*) https://www.destinationsonadash.com/$1 [last,redirect=301]
```

Start the Apache and DB servers and then run `gulp` to watch and rebuild both `js` and `css` files. You can then visit [http://destinationsonadash.localhost/](http://destinationsonadash.localhost/) (or the url defined in your `wp-config` file) to view the application.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<br />

## Deployment

This application can be hosted on any service that supports WordPress. At its most basic, you'll need a running `MySQL` DB and a configured [Apache](https://www.apache.org/) web server (or [NGINX](https://www.nginx.com/)) to handle requests.

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[wordpress]: https://img.shields.io/badge/WordPress-FFFFFF?style=for-the-badge&logo=wordpress&logoColor=21759B
[wordpress-url]: https://wordpress.org/
[gulp]: https://img.shields.io/badge/Gulp-CF4647?style=for-the-badge&logo=gulp&logoColor=FFFFFF
[gulp-url]: https://gulpjs.com/
[foundation]: https://img.shields.io/badge/Foundation-2C3840
[foundation-url]: https://get.foundation/
[sass]: https://img.shields.io/badge/SASS-FFFFFF?style=for-the-badge&logo=sass&logoColor=CC6699
[sass-url]: https://sass-lang.com/
[jquery]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=78CFF5
[jquery-url]: https://jquery.com/
