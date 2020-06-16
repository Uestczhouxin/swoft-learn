#!/bin/bash
basepath=$(cd `dirname $0`; pwd)
cd $basepath
if [ -f "../runtime/swoft.pid" ];then
cat ../runtime/swoft.pid | awk '{print $1}' | xargs kill && rm -rf ../runtime/swoft.pid && rm -rf ../runtime/logs
php swoft http:stop
fi
php swoft http:start -d
