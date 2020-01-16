<?php

use Faker\Generator as Faker;
use App\Models\Admin\Product;

$factory->define(Product::class, function (Faker $faker) {
    $test = $faker->numberBetween(1, 3);
    return [
            'code' => "product".$faker->unique()->numberBetween(1, 9999),
            'name' => $faker->unique()->lastName,
            'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,",
            'price' => $faker->randomFloat(null,1000, 2000),
            // 'image' => $faker->unique()->imageUrl($width = 248  , $height = 248, 'technics'),
            'image' => "[\"uploads\/products\/5e1edaf81eaa0.jpg\"]",
            'price_new' => $faker->randomFloat(null,900,1200),
            'feature' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,",
            'use' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,",
            // 'screen_size' => '',
            // 'storage_type' => '',
            // 'size' => '',
            // 'rom' => $faker->numberBetween(1, 10000),
            // 'ram' => $faker->numberBetween(1, 100),
            // 'graphics' => '',
            'quantity' => $faker->numberBetween(10, 1000),
            // 'processorModel' => '',
            // 'operating_system' => '',
            // 'battery' => $faker->numberBetween(10, 50000),
            // 'headphone_jack' => '',
            // 'number_of_usb' => 2,
            // 'number_of_hdmi' => 2,
            // 'hard_drive_interface' => '',
            // 'processor' => '',
            // 'webcam' => '',
            'warranty' => $faker->numberBetween(1, 356),
            // 'meterial' => '',
            // 'model_number' => '',
            'color' => $faker->randomElement(['Black', 'Silver', 'Rosegold', 'Pink', 'Grey', 'Gold']),
            'brand_id' => $test,
            'catagory_id' => $test,
            // 'UPC' => '',
            // 'view' => '',
            'status' =>$faker->randomElement([1, 2, 3, 4]),
            'year' => '2018',
            // 'weight' => 10,
            // 'numberic_keyboard' => '',
            // 'optical_drive_type' => '',
        // 'type' => $faker->numberBetween(1, 3),
    ];
    // for Laptop : {"outstandingfeatures":"khởi động nhanh","description":"thanh lịch, mạnh mẽ","display":"fulldh 1920x1080","design":"vỏ nhôm nguyên khối","operator":"window10, macos, linux","camera":"12.0mpx","cpu":"core I7-8000","ram":"16G","harddrive":"SSD 500G","graphicscard":"Graphic 1000","cpuspeed":"3.4","socket":"USB 3.0, HDMI","weight":2,"size":"20cmx18cm","maxram":"64G","audiotechnology":"loa vòm","touchoption":1,"wifi":"3.0","memorycard":"SD","comppact-disc":0,"pin":"6cell","material":"vỏ nhôm"}
    // for Mobile : {"display":"onled fullhd","operator":"android","rearcamera":"20.0mpx","frontcamera":"16.0mpx","cpu":"Quacom","ram":"4G","internalmemory":"16G","externalmemory":"128G","sim":"nano sim, medium","quantitysim":2,"resolution":"1920x1080","advancedphotography":"new","flash":1,"cpuspeed":"3.0","headphonejack":"2.0","network":"3G,4G","weight":1,"size":"120cm x 100cm","quality":"high","pin":"5400mah","security":"vân tay","function":"doanh nhân","meetingday":"2019-02-06"}
    // for phu kien : {"description":"Tai nghe đời mới","jack":"2.0","length":1,"speedread":"500","speedwrite":"400","electric":5,"function":"nghe nhạc","typeconnet":"bluetooth","model":"123456","power":"300","efficiency":2,"capacity":3}
});
