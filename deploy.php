<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'CRM_Salon');

// Project repository
set('repository', 'https://github.com/hoangtrunga1k55/Salon_THQ.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('45.77.14.51')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '~/{{application}}');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

