Chat System
================

Deprecated Chat system used for Ultimate Warfare.

## Setup in Symfony

Add parameters to services.yaml
```
parameters:
    app.uw_chat_hostname: '%env(UW_CHAT_HOSTNAME)%'
    app.uw_chat_address: '%env(UW_CHAT_ADDRESS)%'
    app.uw_chat_service_port: '%env(UW_CHAT_SERVICE_PORT)%'
    app.uw_chat_public_port: '%env(UW_CHAT_PUBLIC_PORT)%'
```

Add settings to .env
```
UW_CHAT_HOSTNAME=ultimate-warfare.com/wss/
UW_CHAT_ADDRESS=0.0.0.0
UW_CHAT_PUBLIC_PORT=443
UW_CHAT_SERVICE_PORT=8080
```

### Chat Server

Add to your apache vhost file:
```
ProxyPass /wss/ ws://localhost:8080/
ProxyPassReverse /wss/ ws://localhost:8080/
```

Enable mod_proxy and mod_proxy_wstunnel to handle secure websocket traffic
```bash
$ sudo a2enmod proxy
$ sudo a2enmod proxy_wstunnel
$ sudo systemctl restart apache2
````

Start the ChatServer
```bash
php bin/console chat:start
```

##### Run chat server as a service on Debian
Copy uw-chat.service into /etc/systemd/system/uw-chat.service and enable/start the service
```bash
systemctl enable uw-chat
systemctl start uw-chat
systemctl status uw-chat


## Links

- [Issue tracker](https://github.com/FrankProjects/Chat/issues)


## License

Chat is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).
