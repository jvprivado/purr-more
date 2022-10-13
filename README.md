<h1 align="center" style="color:teal">Purr More</h1>

### Setup API
1. Install dependencies: `composer install`
2. Setup environment:
    1. Copy the shared `.env` file to project root directory and add required changes, eg: <i>database credentials, app link, etc.</i>
    2. `php artisan migrate:fresh --seed` to re-create tables and import existing data or,  
   `php artisan migrate:fresh` to just re-create fresh database tables
3. Setup required library:
   1. Install FFmpeg 
   2. Update FFmpeg Path In `ApiController` -> `storePur()` method
   `'ffmpeg.binaries'  => 'Local machine path, usually: /usr/bin/ffmpeg'`  
   `'ffprobe.binaries' => 'Local machine path' usually: /usr/bin/ffprobe`

**Note:**   
   *Do not re-generate app key (for encryption purpose)   
   Set: `app_env = local/production` as needed  
   `app_debug = true/false` for on/off debugging messages

### Run API
Execute:  
`php artisan optimize`  
`php artisan config:clear`  
finally,  
`php artisan serve` to start the local server (not required for production server)
<hr>

### PHP Configuration Setup
For uploading large files, in the server's php.ini file change these values  
`Post_max_size : 200M`  
and,  
`upload_max_size : 160 M`

<hr>

### Setup Frontend
1. Install dependencies: `npm install`
2. Compile frontend for development: `npm run dev`  
   or,  
   Compile frontend for production: `npm run prod`
   
<hr>
