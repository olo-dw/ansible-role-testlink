# Ansible Role Testlink

## Prerequisites

* Mysql 5.6
* apache2
* php5-common, php5-cli, php5-mysql, libapache2-mod-php5

## Usage

    http://<server>

Initial credentials are `admin/admin`

## Example Playbook

    - hosts: servers
      roles:
      - role: testlink
        testlink_version: 'latest'

## License

MIT

## Author Information

This role was created in 2016 by Olivier Locard on the behalf of Deveryware.

