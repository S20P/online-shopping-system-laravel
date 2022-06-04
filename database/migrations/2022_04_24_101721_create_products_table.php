    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                        
            $table->string('name')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->longtext('description')->nullable();                 
            $table->unsignedInteger('brand_id')->index();       
            $table->string('sku')->nullable();
            $table->unsignedInteger('stock');  
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
