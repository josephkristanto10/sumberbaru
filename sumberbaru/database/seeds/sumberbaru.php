<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.1.0
 */

/**
 * Database `sumberbaru`
 */

/* `sumberbaru`.`failed_jobs` */
$failed_jobs = array(
);

/* `sumberbaru`.`invoice` */
$invoice = array(
  array('id' => '9','transaction_no' => 'txx','transaction_date' => '2021-10-10','transaction_method' => 'Tunai','transaction_shipment_delivery' => 'true','transaction_shipment_delivery_cost' => '10000','transaction_customer' => 'Bejo','transaction_note' => 'Note Fix','qty_item' => '5','total' => '250000','created_at' => '2021-10-10 21:03:07','updated_at' => '2021-10-10 21:03:07'),
  array('id' => '10','transaction_no' => 'txx','transaction_date' => '2021-10-10','transaction_method' => 'Transfer','transaction_shipment_delivery' => 'true','transaction_shipment_delivery_cost' => '5000','transaction_customer' => 'Joseph','transaction_note' => '13000','qty_item' => '1','total' => '20000','created_at' => '2021-10-10 23:14:00','updated_at' => '2021-10-10 23:14:00')
);

/* `sumberbaru`.`invoice_detail` */
$invoice_detail = array(
  array('id' => '3','idproduct' => '3','idtransaction' => '9','qty' => '2','selling_price' => '50000','subtotal' => '100000','created_at' => '2021-10-10 21:03:08','updated_at' => '2021-10-10 21:03:08'),
  array('id' => '4','idproduct' => '1','idtransaction' => '9','qty' => '3','selling_price' => '50000','subtotal' => '150000','created_at' => '2021-10-10 21:03:08','updated_at' => '2021-10-10 21:03:08'),
  array('id' => '5','idproduct' => '2','idtransaction' => '10','qty' => '1','selling_price' => '20000','subtotal' => '20000','created_at' => '2021-10-10 23:14:01','updated_at' => '2021-10-10 23:14:01')
);

/* `sumberbaru`.`migrations` */
$migrations = array(
  array('id' => '1','migration' => '2014_10_12_000000_create_users_table','batch' => '1'),
  array('id' => '2','migration' => '2014_10_12_100000_create_password_resets_table','batch' => '1'),
  array('id' => '3','migration' => '2019_08_19_000000_create_failed_jobs_table','batch' => '1'),
  array('id' => '4','migration' => '2021_08_29_023751_product_migration','batch' => '1'),
  array('id' => '5','migration' => '2021_08_29_023819_supplier_migration','batch' => '1'),
  array('id' => '6','migration' => '2021_08_31_154231_supplierproduct','batch' => '1'),
  array('id' => '7','migration' => '2021_09_04_000501_supplierproductlog','batch' => '1'),
  array('id' => '8','migration' => '2021_09_05_120922_stok_log','batch' => '1'),
  array('id' => '9','migration' => '2021_10_10_185823_invoice_migration','batch' => '1'),
  array('id' => '10','migration' => '2021_10_10_185832_invoice_detail_migration','batch' => '1')
);

/* `sumberbaru`.`password_resets` */
$password_resets = array(
);

/* `sumberbaru`.`product` */
$product = array(
  array('id' => '1','name' => 'product1','stok' => '0','kode' => 'xxx','harga1' => '10000','harga2' => '30000','harga3' => '50000','created_at' => '2021-08-29 08:00:00','updated_at' => '2021-09-05 15:58:37'),
  array('id' => '2','name' => 'producty','stok' => '0','kode' => 'P-01','harga1' => '0','harga2' => '0','harga3' => '0','created_at' => NULL,'updated_at' => '2021-09-05 15:58:47'),
  array('id' => '3','name' => 'product3','stok' => '0','kode' => 'P-03','harga1' => '0','harga2' => '0','harga3' => '0','created_at' => NULL,'updated_at' => NULL)
);

/* `sumberbaru`.`stok_log` */
$stok_log = array(
);

/* `sumberbaru`.`supplier` */
$supplier = array(
  array('id' => '1','name' => 'PT Kaca Megah','phone' => '08182873672','address' => 'Mulyosari 10','status' => NULL,'created_at' => '2021-09-02 14:36:25','updated_at' => '2021-09-02 14:36:25'),
  array('id' => '2','name' => 'PT Neraca Kaya','phone' => '08199827384','address' => 'Kedung Asem gg 2 / 49','status' => NULL,'created_at' => '2021-09-02 14:37:03','updated_at' => '2021-09-02 14:37:03')
);

/* `sumberbaru`.`supplier_product` */
$supplier_product = array(
  array('id' => '1','idsupplier' => '2','idproduct' => '1','price' => '0','status' => 'Active','created_at' => '2021-09-02 15:11:17','updated_at' => '2021-09-02 15:11:17'),
  array('id' => '4','idsupplier' => '1','idproduct' => '2','price' => '0','status' => NULL,'created_at' => NULL,'updated_at' => NULL)
);

/* `sumberbaru`.`supplier_product_log` */
$supplier_product_log = array(
);

/* `sumberbaru`.`users` */
$users = array(
);
