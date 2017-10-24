"totalwebconnections/simple-blog": "dev-master"
"psr-4": {
            "App\\": "app/",
            "totalWebConnections\\simpleBlog\\": "vendor/totalWebConnections/simple-blog/src"
        }


The bootstrap/cache directory must be present and writable?
-php artisan cache:clear


up the databases: php artisan migrate --path=vendor/totalwebconnections/simple-blog/migrations/

add to providers: totalWebConnections\simpleBlog\simpleBlogServiceProvider::class,



publish the views: php artisan vendor:publish