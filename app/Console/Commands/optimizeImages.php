<?php

namespace App\Console\Commands;

use App\Repositories\PropertyRepository;
use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class optimizeImages extends Command
{
    /**
     * Image sizes to optimize
     */
    const FOLDERS = [
        'uploaded',
        'small500',
        'thumbs300',
        'thumbs170',
        'webp'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:optimize';

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
        foreach (self::FOLDERS as $folder) {
            $this->directoryScan('public/images/' . $folder);
        }
        return 0;
    }
    public function directoryScan($base) {
        $imgSvc = new ImageService;
        $directories = Storage::disk('local')->allDirectories($base);
        foreach ($directories as $directory) {
            $files = Storage::disk('local')->allFiles($directory);
            foreach ($files as $file) {
                echo "Processing ".$file."\r\n";
                $imgSvc->optimize(storage_path() . '/app/' . $file);
            }
        }
    }
}
