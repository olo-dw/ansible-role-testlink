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

## Default variables

    testlink_version: 1.9.15
    testlink_package_url: "http://freefr.dl.sourceforge.net/project/testlink/TestLink%201.9/TestLink%201.9.15/testlink-1.9.15.tar.gz"
    testlink_repo_url: "https://github.com/TestLinkOpenSourceTRMS/testlink-code.git"

    testlink_directory: "/var/www/testlink-1.9.15"
    testlink_user: 'testlink'
    testlink_group: 'testlink'
    testlink_var_dir: '/var/testlink'

    testlink_dbms: 'mysql'
    testlink_db_name: 'testlink'
    testlink_db_user: 'testlink'
    testlink_db_password: 't3stl1nk'
    testlink_db_host: 'localhost'
    testlink_db_prefix: ''

    testlink_webserver_user: 'www-data'

## Advanced variables

### LDAP
To activate the ldap configuration you need to turn `testlink_ldap_enabled` into True and set the other parameters below:

    testlink_ldap_enabled: True
    testlink_ldap_server: 'ldap.company.com'
    testlink_ldap_port: 636
    testlink_ldap_root_dn: 'dc=company,dc=com'
    testlink_ldap_uid_field: 'sAMAccountName'
    testlink_ldap_bind_dn: 'domain.account@company.com'
    testlink_ldap_bind_passwd: 'PassWorD'

## License

MIT

## Author Information

This role was created in 2016 by Olivier Locard on the behalf of Deveryware.

