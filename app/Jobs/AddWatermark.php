<?php

namespace App\Jobs;

use App\Models\Images;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class AddWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Images::find($this->announcement_image_id);
        if (!$i){
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);


            $image = SpatieImage::load($srcPath);

            $image->watermark(base_path('resources/img/Logo_presto2-removebg-preview.png'))
                ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
                ->watermarkWidth($image->getWidth()*0.15, Manipulations::UNIT_PIXELS)
                ->watermarkHeight($image->getHeight()*0.10, Manipulations::UNIT_PIXELS)
                ->watermarkPadding(3, 3, Manipulations::UNIT_PERCENT)
                ->watermarkFit(Manipulations::FIT_FILL)
                ->watermarkOpacity(40);

            $image->save($srcPath);
  

    }
}