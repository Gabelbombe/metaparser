#!/bin/sh
# CPR : Jd Daniel :: Ehime-ken
# MOD : 2014-03-20 @ 17:06:38
# VER : Version 1a

# If the user is not root
if [ "$(id -u)" != "0" ]; then
  echo "This script must be run as root" 1>&2 ; exit 1
fi

cdir=$( cd "$(dirname "$0")" ; pwd -P )

# assumes sudoer
cp "${cdir}/metaparser.conf" /etc/apache2/sites-available/
echo -e "\n127.0.0.1\tmetaparser.dev\twww.metaparser.dev" >> /etc/hosts
cd /etc/apache2/sites-available/ && a2ensite metaparser.conf

service apache2 reload

exit 1
