<?php
/**
 * Configuration file
 *
 */

    /**
     * Do you want to validate the operation against a password
     * Usage: https://api.com?pass=pass
     */
    $requirePassword = true;
    $password = 'stmy123';

    /**
     * Does branch name has to be specified explicitly?
     * Usage: https://api.com?branch=master
     */
    $requireBranch = false;

    /**
     * Set a default branch for git operations
     * Must be specified when $requireBranch is set to false
     */
    $branch = 'live';

    /**
     * Are you using bitbucket hook to call this script
     */
    $bitbucketPush = true;
