<?php

namespace App\Console\Commands;

use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * Class webpImages
 * Creates webp images for all files in the specified directories
 *
 * @package App\Console\Commands
 */
class webpImages extends Command
{
    /**
     * Image sizes to convert
     */
    const FOLDERS = [
        'uploaded',
        'small500',
        'thumbs300',
        'thumbs170'
    ];

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
    protected $description = 'Creates webp images for all files in the specified directories';

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

        foreach (self::FOLDERS as $folder) {
            $this->checkDirectory('public/images/webp/' . $folder);
            $this->directoryScan('public/images/', $folder);
        }

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
