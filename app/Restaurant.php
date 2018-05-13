<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $branch
 * @property string $phone
 * @property string $email
 * @property string $logo
 * @property string $address
 * @property string $housenumber
 * @property string $postcode
 * @property string $city
 * @property string $latitude
 * @property string $longitude
 * @property string $url
 * @property string $open
 * @property string $bestMatch
 * @property string $newestScore
 * @property string $ratingAverage
 * @property string $popularity
 * @property string $averageProductPrice
 * @property string $deliveryCosts
 * @property string $minimumOrderAmount
 */
class Restaurant extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'branch', 'phone', 'email', 'logo', 'address', 'housenumber', 'postcode', 'city', 'latitude', 'longitude', 'url', 'open', 'bestMatch', 'newestScore', 'ratingAverage', 'popularity', 'averageProductPrice', 'deliveryCosts', 'minimumOrderAmount'];

}
