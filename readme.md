<p align="center">
<h2 align="center">Wastebin</h2><br>
A self-hosted pastebin alternative<br>
<a href="https://wastebin.io">https://wastebin.io</a><br>
<img src="https://i.imgur.com/p6ZMC6b.png" align="center">
</p>

## Features

* Fully self-hosted
* Over 100+ supported languages
* Both light and dark themes
* Password protected and encrypted pastes (encryption coming soon)
* Self-destruct (coming soon)
* Mobile friendly
* MIT Licensed 


## Information

**Current Version:** 1.0

Please feel free to fork or contribute! This is still in early development, so it is a work-in-progress. 

The primary editor is based on [Ace](https://ace.c9.io/).



## Installation
The primary mode of installation is through docker. There isn't currently a docker image (check the to-do!) in the public repositories, so you'll have to build this yourself, use the following docker compose, or move to your own webserver.

Submit all pull-requests to the `dev` branch.

First clone the repository:

```
 git clone https://github.com/mdotshell/wastebin.git
```

Next, add service to your `docker-compose.yml` or root of your web server.
```
version: "2"
services:
    wastebin:
        container_name: wastebin
        image: 'php:7.4.1-apache-buster'
        volumes:
            - '.:/var/www/html'
        environment:
            - BASE_URL=https://wastebin.io
            - BRAND_NAME=WASTEBIN
            - BRAND_PHRASE=Because all my code is trash
            - PAGE_TITLE=WASTEBIN
        restart: unless-stopped
        ports:
            - "8080:80"
        command: /bin/bash -c 'a2enmod rewrite; apache2-foreground'
```


## Environment Variables
There are a few environment variables which can be used to customize the site.

| Variable Name | Required | Default | Description |
|---|---|---|---|
| BASE_URL | true | https://wastebin.io | Sets the root URL for the site |
| BRAND_NAME | false | WASTEBIN | Used to set the brand name on the far-left of the menu bar |
| BRAND_PHRASE | false | Because all my code is trash | Used to set the phrase. If you wish to have no phrase you will need to specify it as "" |
| PAGE_TITLE | false | WASTEBIN | Used to set the value of the `<title>` html tag | 


## To-Do
As stated above, this is an unfinished work. The items on this list are meant to help collaborators determine the direction of the project. Any help with UX is greatly appreciated! Any changes should try to avoid bulky libraries and stick as close to [BootStrap 4](https://getbootstrap.com/) and [Darkly](https://bootswatch.com/darkly/) bootswatch theme as possible.

* Finish self-destruct functionality - in progress
* Encrypt code at rest with password - in progress
* Allow custom self-destruct times. With units: Minutes, Hours, Weeks, Months
* Create Dockerfile and commit image to public repositories with docker-compose v3
* Run container as non-root user
* Create a settings menu with the following abilities:
  * Adjust font-size
  * Set editor input style, such as vim, emacs, etc. It should be possible with Ace
  * Track own pastes through cookies
* Allow for MySQL/MariaDB database types (currently sqlite)
* Robust API for CLI ability to paste and view with password
* Add screenshots to the readme

Ideas for the distant future:

* Allow code highlighting and shared notes for reviewers.


## Contact

Please leave any issues in the [issues](https://github.com/mdotshell/wastebin/issues) section.

For anything else you can email me at wastebin@mdt.sh or find me in the [/r/homelab discord channel](https://www.reddit.com/r/homelab/comments/fdy483/rhomelab_discord/)