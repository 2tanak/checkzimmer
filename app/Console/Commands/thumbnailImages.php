<?php

namespace App\Console\Commands;

use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * Class thumbnailImages
 * Creates a set of smaller images
 *
 * @package App\Console\Commands
 */
class thumbnailImages extends Command
{
    /**
     * Image sizes to make
     */
    const SIZES = [
      'small500' => 500,
      'thumbs300' => 300,
      'thumbs170' => 170
    ];

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
    protected $description = 'Make a set of smaller images for all images in uploads directory';

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
    public function handle(): int
    {
        foreach (self::SIZES as $key => $size) {
            $this->checkDirectory('public/images/' . $key);
        }

        $this->directoryScan('public/images/uploaded');

        return 0;
    }
    /**
     * Scan directory for files, process
     * each file through resize mechanics
     *
     * @param string $base - directory base to scan
     */
    public function directoryScan(string $base) {
        $imgSvc = new ImageService;
        $directories = Storage::disk('local')->allDirectories($base);

        foreach ($directories as $i => $directory) {

            foreach (self::SIZES as $key => $size) {
                $destDir = str_replace('/images/uploaded', '/images/'.$key, $directory);
                $this->checkDirectory($destDir);
            }

            if ($i == 0) {
                continue;
            }

            $files = Storage::disk('local')->allFiles($directory);

            foreach ($files as $file) {
                echo "Processing ".$file."\r\n";
                list($width, $height) = getimagesize(storage_path() . '/app/' . $file);

                foreach (self::SIZES as $key => $size) {
                    $output = str_replace('/images/uploaded', '/images/' . $key, $file);
                    $k = $size / $width;
                    $imgSvc->imageResize(storage_path() . '/app/' . $file, $k, storage_path() . '/app/' . $output);
                }
            }
        }
    }

    /**
     * Checks if directory exist and creates one if not
     * @string $dir - directory to check
     */
    function checkDirectory($dir) {
        if (!Storage::disk('local')->exists($dir)) {
            echo "Creating dir ".$dir."\r\n";
            mkdir(storage_path() . '/app/' . $dir);
        }
    }
}
