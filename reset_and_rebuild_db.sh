#!/bin/bash
# reset the migrations to drop all tables
cake migrate reset

# build tables
cake migrate
cake schema run create DbAcl

# populate tables
cake populate

# build ACO tree
cake acl_extras aco_update

curl http://localhost/~madnashua/tellann/acl_setup/administrators_build
curl http://localhost/~madnashua/tellann/acl_setup/support_build
curl http://localhost/~madnashua/tellann/acl_setup/business_build