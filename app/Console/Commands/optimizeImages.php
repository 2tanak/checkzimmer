<?php

namespace App\Console\Commands;

use App\Repositories\PropertyRepository;
use App\Services\ImageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class optimizeImages extends Command
{
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
        $this->directoryScan('public/images/uploaded');
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
