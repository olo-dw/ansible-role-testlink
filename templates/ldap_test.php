<?php

// Fill with a user to test the ldap search
$test_username = '';

function println ($string_message) {
  print "$string_message<br />";
}
echo "*** DEBUG LDAP *** <br/>";

require_once('custom_config.inc.php');
foreach($tlCfg->authentication['ldap'][1] as $key => $value) {
  echo $key." = ".$value."<br />";
}
println ('');

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$test_username = 'ava-dw'

$ldap_server = $tlCfg->authentication['ldap'][1]['ldap_server'];
$ldap_port = $tlCfg->authentication['ldap'][1]['ldap_port'];
$ldap_version = $tlCfg->authentication['ldap'][1]['ldap_version'];
$ldap_root_dn = $tlCfg->authentication['ldap'][1]['ldap_root_dn'];
$ldap_bind_dn = $tlCfg->authentication['ldap'][1]['ldap_bind_dn'];
$ldap_bind_passwd = $tlCfg->authentication['ldap'][1]['ldap_bind_passwd'];
$ldap_uid_field = $tlCfg->authentication['ldap'][1]['ldap_uid_field'];

println("ldap_connect to server: $ldap_server port: $ldap_port");
$ldapconn = ldap_connect($ldap_server, $ldap_port)
 or die("Could not connect to LDAP server.");
println("msg: '".ldap_error($ldapconn)."' ");
println("Conn: $ldapconn");
println('');

if ($ldapconn) {
  ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, $ldap_version);
  $dn="$ldap_bind_dn" ;
  println("ldap_bind($ldapconn, $dn, ldap_bind_passwd)");
  $ldapbind = ldap_bind($ldapconn, $dn, $ldap_bind_passwd);

  if ($ldapbind) {
    println("LDAP bind successful...");
  } else {
    println("LDAP bind failed...");
    println("msg: '".ldap_error($ldapconn)."' ");
  }
}

if ($test_username) {
  println('');
  $ldap_search_filter = "$ldap_uid_field=$test_username";
  $justthese = array("sn", "givenname", "mail", "displayname");
  println("ldap_search_filter: ".$ldap_search_filter);
  $ldapsearch = ldap_search( $ldapconn, $ldap_root_dn, $ldap_search_filter, $justthese )
    or die("Error in search query: ".ldap_error($ldapconn));

  $data = ldap_get_entries($ldapconn, $ldapsearch);
  foreach($justthese as $attr) {
    foreach($data[0]["$attr"] as $key => $value) {
      echo $attr.": ".$key." = ".$value."<br />";
    }
  }
}

ldap_unbind($ldapconn);

echo "<br/>*** DEBUG LDAP ***";
?>
