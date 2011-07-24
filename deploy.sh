#!/bin/sh

echo rsync deployment for kkelegant
cd ..
rsync -essh -vta --cvs-exclude kkelegant tinoboxc@tinobox.com:public_html/kk/wp-content/themes/
