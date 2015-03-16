Authentication
==============

## Version: 0.3
##

## About
##

Adds support for LDAP authentication for version 2.0 of SMF. Allows syncing of active directory users into the members table and the ability of active directory users to log into SMF.

## License
##

Please see the license.txt file

## Features
##

- Sync users into a specific membergroup (primary group only), only on initial import not available when updating existing users.
- Sync active directory users into SMF members table, the details synced are: username, email
- If a user has already been synced into the members table then only the email address is updated in the members table.
- When logging into SMF the username is checked against the members table and if it exists then a check is done externally to SMF against the active directory to validate the username and password.
- Passwords are NEVER stored in SMF.

## Revisions
##

v0.3 (November 2013)
 - Added ability to sync users into a selected primary membergroup.

v0.2 (October 2013)
 - Fixed minor bug for uncaught exception when running a sync

v0.1 (June 2013)
 - Allow active directory users to login into SMF once validated via LDAP
 - Sync users from active directory into SMF members table
 - Adding LDAP support