<?php

$ip = '192.168.0.103'; //extensiondb
$domainname= 'emre.lab';
$user = "administrator@".$domainname;
$pass = '123123Aa';
$server = 'ldaps://'.$ip;

$ldap = ldap_connect($server);
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_X_TLS_REQUIRE_CERT, LDAP_OPT_X_TLS_NEVER);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

$bind=ldap_bind($ldap, $user, $pass);
if (!$bind) {
    exit('Binding failed');
} 


$filter = "(cn=*)";
$result = ldap_search($ldap, "cn=Users,dc=emre,dc=lab", $filter);
$entries = ldap_get_entries($ldap, $result);
//$count = ldap_count_entries($ldap, $result);

var_dump($entries);

?>
