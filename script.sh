#!/bin/bash
# change permission of this file: chmod u+x script.sh

echo "<br>Script file found successfully"

PROJECT_PATH='/Applications/mamp7/apache2/htdocs/deploy_demo/steamy_db'
BRANCH=$1

# Enter Project Directory
if ls $PROJECT_PATH 1> /dev/null 2>&1; then
	cd $PROJECT_PATH
	echo '<br>Entered project directory successfully'
else
    echo '<br>Invalid directory...'
	echo '<br>EXITING...'
	exit 0
fi

# PULL LIVE BRANCH
echo '<br>EXECUTING GIT COMMAND: 'git checkout ' $BRANCH '&& git up'
git checkout $BRANCH && git up

echo '<br>Pulled ' $BRANCH ' branch successfully'

echo '<br>INSTALLING NODE PACKAGES'
npm install

echo '<br>INSTALLING BOWER PACKAGES'
bower install --allow-root

echo '<br>BRANCH DEPLOYED SUCCESSFULLY'
exit 0