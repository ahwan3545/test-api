<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('store_id')->constrained('stores');
            $table->string('product_name');
            $table->string('product_link')->nullable();
            $table->float('product_price')->default(0);
            $table->integer('quantity');
            $table->string('product_image')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_volume')->nullable();
            $table->float('local_shipping')->default(0);
            $table->float('local_tax')->default(0);
            $table->float('international_shipping')->default(0);
            $table->float('international_tax')->default(0);
            $table->float('customs_clearance')->default(0);
            $table->float('service_fee')->default(0);
            $table->boolean('is_free_delivery')->default(0);
            $table->float('discount')->default(0);
            $table->float('base_cost')->default(0);
            $table->float('order_total')->default(0);
            $table->text('note')->nullable();
            $table->unsignedInteger('status_type_id')->index();
            $table->unsignedInteger('order_status_id')->index();
            $table->timestamps();
            $table->enum('created_from', ['system', 'mobile'])->default('system');
            $table->unsignedInteger('created_by_id')->index();
            $table->softDeletes();
        });

        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('status_type_id')->constrained('status_types');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->enum('created_from', ['system', 'mobile'])->default('system');
            $table->unsignedInteger('created_by_id')->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('orders');
    }
};
