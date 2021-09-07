<?php

namespace App\Console\Commands;

use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class webpImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:webp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->checkDirectory('public/images/webp');
        $this->checkDirectory('public/images/webp/uploaded');
        $this->checkDirectory('public/images/webp/small500');
        $this->checkDirectory('public/images/webp/thumbs300');

        $this->directoryScan('public/images/', 'uploaded');
        $this->directoryScan('public/images/', 'small500');
        $this->directoryScan('public/images/', 'thumbs300');

        return 0;
    }
    public function directoryScan($base, $target) {

        $imgSvc = new ImageService;
        $directories = Storage::disk('local')->allDirectories($base . $target);

        foreach ($directories as $i => $directory) {

            $webpdir = str_replace('/images/'.$target, '/images/webp/'.$target, $directory);
            echo 'Checking ' . $webpdir . "\r\n";
            $this->checkDirectory($webpdir);

            if ($i == 0) {
                continue;
            }

            $files = Storage::disk('local')->allFiles($directory);

            foreach ($files as $file) {
                echo "Processing ".$file."\r\n";
                $slugs = explode('.', $file);
                array_pop($slugs);
                $slugs[] = 'webp';
                $webpFile = implode('.', $slugs);

                $output = str_replace('/images/'.$target, '/images/webp/'.$target, $webpFile);
                //echo "To ".$output."\r\n";
                $imgSvc->imageWebP(storage_path() . '/app/' . $file, storage_path() . '/app/' . $output);
            }
        }
    }
    function checkDirectory($dir) {
        if (!Storage::disk('local')->exists($dir)) {
            echo "Creating dir ".$dir."\r\n";
            mkdir(storage_path() . '/app/' . $dir);
        }
    }
}
