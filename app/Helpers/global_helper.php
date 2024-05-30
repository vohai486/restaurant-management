<?php
if (!function_exists('generateUniqueSlug')) {
  function generateUniqueSlug($model, $name): string
  {
    $modelClass = "App\\Models\\$model";

    if (!class_exists($modelClass)) {
      throw new \InvalidArgumentException("Model $model not found.");
    }

    $slug = \Str::slug($name);
    $count = 2;

    while ($modelClass::where('slug', $slug)->exists()) {
      $slug = \Str::slug($name) . '-' . $count;
      $count++;
    }

    return $slug;
  }
}

if (!function_exists('currencyPosition')) {
  function currencyPosition($price): string
  {

    return '$' . $price;
  }
}

/** Calculate cart total price */
/** Calculate cart total price */
if (!function_exists('cartTotal')) {
  function cartTotal()
  {
    $total = 0;

    foreach (Cart::content() as $item) {
      $productPrice = $item->price;
      $sizePrice = $item->options?->product_size['price'] ?? 0;
      $optionsPrice = 0;
      foreach ($item->options->product_options as $option) {
        $optionsPrice += $option['price'];
      }

      $total += ($productPrice + $sizePrice + $optionsPrice) * $item->qty;
    }

    return $total;
  }
}

/** Calculate product total price */
if (!function_exists('productTotal')) {
  function productTotal($rowId)
  {
    $total = 0;

    $product = Cart::get($rowId);

    $productPrice = $product->price;
    $sizePrice = $product->options?->product_size['price'] ?? 0;
    $optionsPrice = 0;

    foreach ($product->options->product_options as $option) {
      $optionsPrice += $option['price'];
    }

    $total += ($productPrice + $sizePrice + $optionsPrice) * $product->qty;


    return $total;
  }
}

/** grand cart total */
if (!function_exists('grandCartTotal')) {
  function grandCartTotal($deliveryFee = 0)
  {
    $total = 0;
    $cartTotal = cartTotal();

    if (session()->has('coupon')) {
      $discount = session()->get('coupon')['discount'];
      $total = ($cartTotal + $deliveryFee) - $discount;

      return $total;
    } else {
      $total = $cartTotal + $deliveryFee;
      return $total;
    }
  }
}

/** Generate Invoice Id */
if (!function_exists('generateInvoiceId')) {
  function generateInvoiceId()
  {
    $randomNumber = rand(1, 9999);
    $currentDateTime = now();

    $invoiceId = $randomNumber . $currentDateTime->format('yd') . $currentDateTime->format('s');

    return $invoiceId;
  }
}