<?php

namespace KamalSroor\LaravelSettings\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Setting extends Model implements HasMedia
{

    use InteractsWithMedia;
    use HasUploader;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'locale', 'value',
    ];


      /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        // $this->addMediaCollection('logo')->singleFile();

        $this
        ->addMediaCollection('logo')
        // ->useFallbackUrl('https://www.gravatar.com/avatar/'.md5($this->email).'?d=mm')
        ->singleFile()
        ->registerMediaConversions(function () {
            $this->addMediaConversion('thumb')
                ->width(70)
                ->format('png');

            $this->addMediaConversion('small')
                ->width(120)
                ->format('png');

            $this->addMediaConversion('medium')
                ->width(160)
                ->format('png');

            $this->addMediaConversion('large')
                ->width(320)
                ->format('png');
        });


        $this->addMediaCollection('favicon')->singleFile();
    }


}
