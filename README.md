## Wastebin

#### A self-hosted pastebin alternative</h5><br>

[https://wastebin.io](https://wastebin.io)

![wastebin-screenshot](https://i.imgur.com/p6ZMC6b.png)

## Features

* Fully self-hosted
* Anonymous
* Over 100+ supported languages
* Both light and dark themes
* Password protected and encrypted pastes
* Custom Self-destruct timers (coming soon)
* Mobile friendly
* MIT Licensed 


## Information

**Current Version:** 1.0

Please feel free to fork or contribute! This is still in early development, so it is a work-in-progress. 

The primary editor is based on [Ace](https://ace.c9.io/) editor.



## Installation
The primary mode of installation is through docker. There isn't currently a docker image (check the roadmap) in the public repositories, so you'll have to build this yourself, use the following docker compose.

You can also clone to any existing PHP server and set the environment variables below. Both the php-mysqli and apache2-rewrite mods will need to be installed/enabled.

First clone the repository:

```
 git clone https://github.com/mdotshell/wastebin.git
```

Then build with

`cd ./wastebin && docker-compose up -d`




## Environment Variables
There are a few environment variables which can be used to customize the site.

| Variable Name | Required | Default | Description |
|---|---|---|---|
| BASE_URL | true | https://wastebin.io | Sets the root URL for the site |
| BRAND_NAME | false | WASTEBIN | Used to set the brand name on the far-left of the menu bar |
| BRAND_PHRASE | false | Because all my code is trash | Used to set the phrase. If you wish to have no phrase you will need to specify it as "" |
| PAGE_TITLE | false | WASTEBIN | Used to set the value of the `<title>` html tag |
| MYSQL_HOST | true | Points to wastebin  | Used to set the location of the database host |
| MYSQL_DATABASE | true | wastebin | Specify the name of the database to be connected to. Should be the same on both containers |
| MYSQL_PORT | true | 3306 | The port the database is listening on |
| MYSQL_USER | true | wastebin | Username used to connect to the db container. Should be the same on both containers |
| MYSQL_PASSWORD | true | wastebin | Password used to connect to the db container. Should be the same on both containers |



## Feature Roadmap
As stated above, this is an unfinished work. The items on this list are meant to help collaborators determine the direction of the project. Any help with UX is greatly appreciated! Any changes should try to avoid bulky libraries and stick as close to [BootStrap 4](https://getbootstrap.com/) and [Darkly](https://bootswatch.com/darkly/) bootswatch theme as possible.

* Finish self-destruct functionality - in progress
* ~~Encrypt code at rest with password~~ - complete
* ~~Allow custom self-destruct times. With units: Minutes, Hours, Weeks, Months~~ - complete
* ~~Create Dockerfile and Docker-compose~~ - complete
* Push image to public repositories
* Run container as non-root user
* Create a settings menu with the following abilities:
  * Adjust font-size
  * Set editor input style, such as vim, emacs, etc. It should be possible with Ace
  * Track own pastes through cookies
* ~~Move to MySQL back-end~~ - complete
* Robust API for CLI ability to paste and view with password
* Update screenshots to the readme
* Add auto-code type detection
* Add admin-only pastes so that users can only view pastes
* Add "Share" functionality to email paste link and password to recipient

Ideas for the distant future:

* Allow code highlighting and shared notes for reviewers.


## Contact

Please leave any issues in the [issues](https://github.com/mdotshell/wastebin/issues) section.

For anything else you can email me at wastebin@mdt.sh or find me in the [/r/homelab discord channel](https://www.reddit.com/r/homelab/comments/fdy483/rhomelab_discord/)
