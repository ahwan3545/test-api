<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'customer_id',
        'store_id',
        'product_name',
        'product_link',
        'product_price',
        'quantity',
        'product_image',
        'product_color',
        'product_size',
        'product_weight',
        'product_volume',
        'currency_type_id',
        'local_shipping',
        'local_tax',
        'international_shipping',
        'international_tax',
        'customs_clearance',
        'service_fee',
        'is_free_delivery',
        'discount',
        'base_cost',
        'order_total',
        'note',
        'status_type_id',
        'order_status_id',
        'created_from',
        'created_by_id',
    ];

    // Let's say in User.php or any other model
    protected $appends = ['formatted_created_at'];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d M Y h:i a');
    }

    public function getProductImageAttribute($value)
    {
        return $value ? asset($value) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id')->select('id', 'name');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id')
            ->select('customers.id', 'customers.name', 'customers.email', 'customers.phone_number');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id')
            ->select('stores.id', 'stores.name', 'stores.image');
    }

    public function statusType()
    {
        return $this->belongsTo(StatusType::class, 'status_type_id')
            ->select('status_types.id', 'status_types.name', 'status_types.color', 'status_types.icon');
    }

    public function statusTypes()
    {
        return $this->belongsToMany(
            StatusType::class,
            OrderStatus::class,
            'order_id',
            'status_type_id'
        )
            ->select('status_types.id', 'status_types.name', 'status_types.color', 'status_types.icon');
    }

    // Define the polymorphic relationship
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable')
            ->select(['id', 'file_path', 'attachable_id', 'attachable_type']);
    }

    public function scopeTableSelect($query)
    {
        $query->select([
            'id',
            'order_number',
            'customer_id',
            'store_id',
            'product_name',
            'product_link',
            'product_price',
            'quantity',
            'product_image',
            'product_color',
            'product_size',
            'product_weight',
            'product_volume',
            'currency_type_id',
            'local_shipping',
            'local_tax',
            'international_shipping',
            'international_tax',
            'customs_clearance',
            'service_fee',
            'is_free_delivery',
            'discount',
            'base_cost',
            'order_total',
            'note',
            'status_type_id',
            'order_status_id',
            'created_from',
            'created_by_id',
            'created_at',
        ]);
    }

    public function scopeTableRelation($query)
    {
        $query->with(['customer', 'store', 'statusType', 'user']);
    }

    /**
     * Generate a new order number.
     *
     * @return string
     */
    public static function generateOrderNumber(): string
    {
        // Get the last order number
        $lastOrder = self::latest('id')->first();

        // Extract the numerical part of the last order number
        $lastOrderNumber = $lastOrder ? (int) filter_var($lastOrder->order_number, FILTER_SANITIZE_NUMBER_INT) : 0;

        // Increment the number and generate the new order number
        $newOrderNumber = $lastOrderNumber + 1;

        return 'ORD-' . str_pad($newOrderNumber, 5, '0', STR_PAD_LEFT);
    }

}
