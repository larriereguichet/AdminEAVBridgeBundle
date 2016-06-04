[![Build Status](https://travis-ci.org/larriereguichet/AdminEAVBridgeBundle.svg?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/larriereguichet/AdminEAVBridgeBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/larriereguichet/AdminEAVBridgeBundle/?branch=master)


# AdminEAVBridgeBundle
Bridge between LAG/AdminBundle and Sidius/EAVModelBundle

## Description
AdminEAVBridgeBundle is a bridge between LAG/AdminBundle and Sidius/EAVModelBundle. It allow to have Admins on entities
handled by the EAVModelBundle.

An event subscriber will listen to any admin creation events, if an admin match the configured, the subscriber will
add it to the Mapper. The DataProvider and the Repository are override to get entities from the family handler instead
of the doctrine's entity manager.

## Installation
```
    composer require lag/admin-eav-bridge-bundle    
```


## Configuration
```yml

    lag_admin_eav_bridge:
        entity: BlueBear\SWBundle\Entity\MyLittleTaunTaunEAVEntity
        mapping:
            # The key is an Admin name. The value is a Family name
            fireman: FireMan

```
