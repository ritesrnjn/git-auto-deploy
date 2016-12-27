<?php

    // Require config file
    require_once 'config.php';


    /**
     * Pass password as pass in url parameter
     */
    if($requirePassword and !isset($_GET['pass'])) {
        echo nl2br('Password is required parameter.\n');
        echo nl2br('EXITING...');
        exit(0);
    } elseif($requirePassword and $password !== $_GET['pass']){
        echo nl2br('Entered password is incorrect.\n');
        echo nl2br('EXITING...\n');
        exit(0);
    } else {
        echo nl2br('Password OK...\n');
    }


    /**
     * Validating Branch
     * a. branch is required as input but not specified by user
     * b. branch is not required but branch string empty in config
     * c. otherwise
     */
    if($requireBranch and !isset($_GET['branch'])){
        echo nl2br('Branch name is required parameter.\n');
        echo nl2br('EXITING...');
        exit(0);
    } elseif (!$requireBranch and $branch==''){
        echo nl2br('Branch name is required parameter.\n');
        echo nl2br('EXITING...');
        exit(0);
    } else {
        $branch = $_GET['branch'];
        echo nl2br('Selected Branch: ' . $branch . '\n');
    }


    /**
     * Bitbucket push
     */
    if($bitbucketPush) {
        $payload = file_get_contents("./bitbucket_push_sample.json");
        $decodedText = json_decode($payload);
        $newBranch = $decodedText->push->changes[0]->new->name;

        if($requireBranch and $newBranch !== $branch){
            echo nl2br('Wrong branch.\n');
            echo nl2br('EXITING...');
            exit(0);
        }
        echo nl2br('Selected Branch: ' . $newBranch . '\n');
        $cmd = 'bash ./script.sh '. $newBranch;
    } else {
        $cmd = 'bash ./script.sh '. $branch;
    }

    
    /**
     * Execute Shell Script
     */
    echo nl2br('EXECUTING SHELL SCRIPT...\n');
    $output = shell_exec($cmd);
    echo $output;
