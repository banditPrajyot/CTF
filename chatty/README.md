# Chatty

## Description:

The application appears as a login page with a chatbot. Both of these are distractions. The chatbot is hosted in the same directory that contains some other sensitive files. Got inspiration from [here](https://twitter.com/Jhaddix/status/1619146051868565504?cxt=HHwWgIDR0a2wrvgsAAAA)

## Setup:

- Install apache2 and php
```bash
$ sudo apt update && sudo apt install apache2 php
```
- Copy the files to `/var/www/html` directory
```bash
$ sudo cp -r <files> /var/www/html
```
- Start apache2 server
```bash
$ sudo service apache2 start
```

## Solution:

- Looking at the network tab in your Browsers developer tools, you should see it making requests to chatbot.php
- Open any of these requests and see that the file is located in a directory named `764473d2-3200-4c99-b0ab-93b8137fce32`
- Force browsing to this directory will reveal a `db_backup.sql` file