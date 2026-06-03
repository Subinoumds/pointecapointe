<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class OptimizeImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize all existing local and public storage images to improve page speed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $manager = new ImageManager(new Driver());

        $directories = [
            public_path('img'),
            storage_path('app/public/gallery'),
            storage_path('app/public/midday-menus'),
            storage_path('app/public/vins'),
            storage_path('app/public/carousel'),
        ];

        $totalOriginal = 0;
        $totalOptimized = 0;

        foreach ($directories as $dir) {
            if (!File::isDirectory($dir)) {
                $this->info("Directory does not exist: $dir");
                continue;
            }

            $this->info("Scanning directory: $dir");
            $files = File::allFiles($dir);

            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                    continue;
                }

                $path = $file->getRealPath();
                $originalSize = File::size($path);
                
                // Skip if already small (e.g. less than 150KB) to avoid double compression
                if ($originalSize < 150000) {
                    continue;
                }

                $this->comment("Optimizing: {$file->getFilename()} (" . number_format($originalSize / 1024, 1) . " KB)");

                try {
                    $img = $manager->read($path);
                    $width = $img->width();
                    
                    // Resize if width > 1600
                    if ($width > 1600) {
                        $img->scale(width: 1600);
                    }

                    // Save back with compression
                    if ($extension === 'png') {
                        $encoded = $img->toPng();
                    } else {
                        $encoded = $img->toJpeg(75);
                    }
                    
                    $encoded->save($path);
                    
                    // Clear state cache to get new file size
                    clearstatcache();
                    $newSize = File::size($path);
                    
                    $saving = (($originalSize - $newSize) / $originalSize) * 100;
                    
                    $this->info("-> Done: " . number_format($newSize / 1024, 1) . " KB (Saved " . number_format($saving, 1) . "%)");
                    
                    $totalOriginal += $originalSize;
                    $totalOptimized += $newSize;
                } catch (\Exception $e) {
                    $this->error("Failed to optimize {$file->getFilename()}: " . $e->getMessage());
                }
            }
        }

        if ($totalOriginal > 0) {
            $totalSaved = $totalOriginal - $totalOptimized;
            $percentage = ($totalSaved / $totalOriginal) * 100;
            $this->info("=== Optimization Complete ===");
            $this->info("Total original size: " . number_format($totalOriginal / 1024 / 1024, 2) . " MB");
            $this->info("Total optimized size: " . number_format($totalOptimized / 1024 / 1024, 2) . " MB");
            $this->info("Total saved: " . number_format($totalSaved / 1024 / 1024, 2) . " MB (" . number_format($percentage, 1) . "%)");
        } else {
            $this->info("No images were optimized (all images are already below 150KB).");
        }
    }
}
