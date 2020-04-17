## Wastebin

#### A self-hosted pastebin alternative</h5><br>

[https://wastebin.io](https://wastebin.io)

![wastebin-screenshot](https://i.imgur.com/p6ZMC6b.png)

## Features

* Fully self-hosted
* Anonymous
* Over 100+ supported languages
* Admin-only pastes (optional) - Users can view, but not submit without entering a password
* Both light and dark themes
* Lock Pastes with a password
* Code encryption at rest
* Custom Self-destruct timers
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
| ADMIN_PASSWORD | false | disabled | Specifying a value here will require input of the "admin" password before you can submit a paste. Users can still view pastes, just not submit without the password |



## Feature Roadmap
As stated above, this is an unfinished work. The items on this list are meant to help collaborators determine the direction of the project. Any help with UX is greatly appreciated! Any changes should try to avoid bulky libraries and stick as close to [BootStrap 4](https://getbootstrap.com/) and [Darkly](https://bootswatch.com/darkly/) bootswatch theme as possible.

- [x] Finish self-destruct functionality
- [x] Encrypt code at rest with password
- [x] Allow custom self-destruct times. With units: Minutes, Hours, Weeks, Months
- [x] Create Dockerfile and Docker-compose
- [x] Move to MySQL back-end
- [x] Add admin-only pastes so that users can only view pastes, but not submit without password
- [ ] Push image to public repositories
- [ ] Run container as non-root user
- [ ] Create a settings menu with the following abilities:
  - [ ] Adjust font-size
  - [ ] Set editor input style, such as vim, emacs, etc. It should be possible with Ace
  - [ ] Track own pastes through cookies
- [ ] Robust API for CLI ability to paste and view with password
- [ ] Update screenshots to the readme
- [ ] Add auto-code type detection
- [ ] Add "Share" functionality to email paste link and password to recipient

Ideas for the distant future:

- [ ] Allow code highlighting and shared notes for reviewers.


## Contact

Please leave any issues in the [issues](https://github.com/mdotshell/wastebin/issues) section.

For anything else you can email me at wastebin@mdt.sh or find me in the [/r/homelab discord channel](https://www.reddit.com/r/homelab/comments/fdy483/rhomelab_discord/)