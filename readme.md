# Wastebin
### A pastebin alternative

## Information

This is the housing repository for https://wastebin.io. Please feel free to fork or contribute! This is still in early development, so it is a work-in-progress.

**Current Version:** 1.0

The primary editor is based on [Ace](https://ace.c9.io/) editor.


## Features

* Fully self-hosted
* Over 100+ supported languages
* Both light and dark themes
* Password protected and encrypted pastes (encryption coming soon)
* Self-destruct (coming soon)
* Mobile friendly


## Installation
The primary mode of installation is through docker. There isn't currently a docker image (check the to-do!) in the public repositories, so you'll have to build this yourself or use the following docker compose.

First clone the repository:

```
 git clone https://github.com/mdotshell/wastebin.git
```

Next, bring up with `docker-compose`
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
        networks:
            - wastebin
        restart: unless-stopped
        ports:
            - "8080:80"
        command: /bin/bash -c 'a2enmod rewrite; apache2-foreground'

networks:
    wastebin
        external:
            name: wastebin
```
## Environment Variables
There are a few environment variables which can be used to customize the site.

| Variable Name | Required | Default | Description |
|---|---|---|---|
| BASE_URL | true | https://wastebin.io | Establishes the root path used for all asset generation |
| BRAND_NAME | false | WASTEBIN | To set the brand name on the far-left of the menu bar |
| BRAND_PHRASE | false | Because all my code is trash | Used to set the phrase. If you wish to have no phrase you will need to specify it as "" |
| PAGE_TITLE | false | WASTEBIN | Used to set the value of the `<title>` html tag | 


## To-Do
As stated above, this is an unfinished work. The items on this list are meant to help collaborators determine the direction of the project. Any help with UX is greatly appreciated! Any changes should try to avoid bulky libraries and stick as close to [BootStrap 4](https://getbootstrap.com/) and [Darkly](https://bootswatch.com/darkly/) bootswatch theme as possible.

* Finish self-destruct functionality
* Encrypt code at rest with password
* Allow custom self-destruct times. With units: Minutes, Hours, Weeks, Months
* Create Dockerfile and commit image to public repositories with docker-compose v3
* Run container as non-root user
* Create a settings menu with the following abilities:
  * Adjust font-size
  * Set editor input style, such as vim, emacs, etc. It should be possible with Ace
  * Track own pastes through cookies
* Allow for MySQL/MariaDB database types (currently sqlite)

Ideas for the distant future:

* Allow code highlighting and shared notes for reviewers.