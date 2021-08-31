<?php

namespace App\Console\Commands;

use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class thumbnailImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:thumbs';

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
        $this->checkDirectory('public/images/thumbs300');
        $this->checkDirectory('public/images/small500');
        $this->directoryScan('public/images/uploaded');
        return 0;
    }
    public function directoryScan($base) {
        $imgSvc = new ImageService;
        $directories = Storage::disk('local')->allDirectories($base);

        foreach ($directories as $i => $directory) {

            $thumbdir = str_replace('/images/uploaded', '/images/thumbs300', $directory);
            $smalldir = str_replace('/images/uploaded', '/images/small500', $directory);
            $this->checkDirectory($thumbdir);
            $this->checkDirectory($smalldir);

            if ($i == 0) {
                continue;
            }

            $files = Storage::disk('local')->allFiles($directory);

            $k300 = 300 / 500;

            foreach ($files as $file) {
                echo "Processing ".$file."\r\n";
                list($width, $height) = getimagesize(storage_path() . '/app/' . $file);

                $output500 = str_replace('/images/uploaded', '/images/small500', $file);
                $output300 = str_replace('/images/uploaded', '/images/thumbs300', $file);

                $k500 = 500 / $width;
                $imgSvc->imageResize(storage_path() . '/app/' . $file, $k500, storage_path() . '/app/' . $output500);
                $imgSvc->imageResize(storage_path() . '/app/' . $output500, $k300, storage_path() . '/app/' . $output300);
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
