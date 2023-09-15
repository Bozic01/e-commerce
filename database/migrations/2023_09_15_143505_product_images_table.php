<?php

use Illuminate\Support\Collection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->string('path', 255);
            $table->string('url', 255);
            $table->string('mime', 55);
            $table->integer('size');
            $table->integer('position')->nullable();
            $table->timestamps();
        });



        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('image-mime');
            $table->dropColumn('image-size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image', 2000)->nullable()->after('slug');
            $table->string('image_mime')->nullable()->after('image');
            $table->integer('image_size')->nullable()->after('image_mime');
        });

        DB::table('products')
            ->select('id')
            ->chunkById(100, function (Collection $products) {
                foreach ($products as $product) {
                    $image = DB::table('product_images')
                        ->select(['product_id', 'url', 'mime', 'size'])
                        ->where('product_id', $product->id)
                        ->first();
                    if ($image) {
                        DB::table('products')
                            ->where('id', $image->product_id)
                            ->update([
                                'image' => $image->url,
                                'image_mime' => $image->mime,
                                'image_size' => $image->size
                            ]);
                    }
                }
            });

        Schema::dropIfExists('product_images');
    }
};
