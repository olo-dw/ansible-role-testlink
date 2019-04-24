# Ansible Role Testlink

## Prerequisites

* Mysql 5.6
* apache2
* php5-common, php5-cli, php5-mysql, libapache2-mod-php5, php5-gd
* php5-ldap (if needed)

## Usage

    http://<server>

Initial credentials are `admin/admin`

## Example Playbook

    - hosts: servers
      roles:
      - role: testlink
        testlink_version: 'latest'

## Default variables

    testlink_version: 1.9.15
    testlink_package_url: "https://sourceforge.net/project/testlink/TestLink%201.9/TestLink%201.9.15/testlink-1.9.15.tar.gz"
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
To activate the ldap configuration you need to turn `testlink_authentication_method` into 'LDAP' and set the other parameters below:

    testlink_authentication_method: 'LDAP'
    testlink_ldap_server: 'ldap.company.com'
    testlink_ldap_port: 636
    testlink_ldap_root_dn: 'dc=company,dc=com'
    testlink_ldap_bind_dn: 'domain.account@company.com'
    testlink_ldap_bind_passwd: 'PassWorD'
    // Following configuration parameters are used to build
    // ldap filter and ldap attributes used by ldap_search()
    // filter => "(&$t_ldap_organization($t_ldap_uid_field=$t_username))";
    // attributess => array( $t_ldap_uid_field, 'dn' );
    testlink_ldap_organization: ''
    testlink_ldap_uid_field: 'uid'

Set to `'true'` to activate the automatic user creation. If user does not exist on DB, but can be get from LDAP, the user will be created automatically with default user role.

    testlink_ldap_automatic_user_creation: 'false'
    testlink_ldap_email_field: 'mail'
    testlink_ldap_firstname_field: 'givenname'
    testlink_ldap_lastname_field: 'sn'

### Force https

    testlink_force_https: 'true'

### SMTP

    testlink_smtp_host: 'smtp.company.com'
    testlink_tl_admin_email: 'admin.testlink@company.com'
    testlink_from_email: 'testlink@company.com'
    testlink_return_path_email: 'noreply.testlink@company.com'

### Import file max size

Maximum uploadfile size to importing stuff in TL. Also check your PHP settings, default is usually 2MBs (2097152 bytes).
Unit BYTES is required by MAX_FILE_SIZE HTML option.

    testlink_import_file_max_size_bytes: '409600'

## License

MIT

## Author Information

This role was created in 2016 by Olivier Locard on the behalf of Deveryware.

