<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.3
 */

/**
 * Database `sumberbaru`
 */

/* `sumberbaru`.`admin` */
$admin = array(
  array('id' => '1','name' => 'joseph','username' => 'superuser','password' => 'superuser')
);

/* `sumberbaru`.`cart` */
$cart = array(
);

/* `sumberbaru`.`failed_jobs` */
$failed_jobs = array(
);

/* `sumberbaru`.`invoice` */
$invoice = array(
  array('id' => '16','transaction_no' => 'txx','transaction_date' => '2021-10-23','transaction_method' => 'Tunai','transaction_shipment_delivery' => 'true','transaction_shipment_delivery_cost' => '10000','transaction_customer' => 'Daniel','transaction_note' => 'OK BOS','qty_item' => '6','total' => '370000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 21:43:13')
);

/* `sumberbaru`.`invoice_detail` */
$invoice_detail = array(
  array('id' => '14','idproduct' => '1','idtransaction' => '16','qty' => '3','selling_price' => '50000','subtotal' => '150000','buyingprice' => '60000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 21:43:13'),
  array('id' => '15','idproduct' => '2','idtransaction' => '16','qty' => '3','selling_price' => '70000','subtotal' => '210000','buyingprice' => '150000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 21:43:13')
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
  array('id' => '10','migration' => '2021_10_10_185832_invoice_detail_migration','batch' => '1'),
  array('id' => '11','migration' => '2021_10_14_102322_retur_mgration','batch' => '1'),
  array('id' => '12','migration' => '2021_10_17_152215_temp_cart_migration','batch' => '1'),
  array('id' => '13','migration' => '2021_10_24_113833_adminmigration','batch' => '1')
);

/* `sumberbaru`.`password_resets` */
$password_resets = array(
);

/* `sumberbaru`.`product` */
$product = array(
  array('id' => '1','name' => 'product1','stok' => '30','kode' => 'xxx','harga1' => '10000','harga2' => '30000','harga3' => '50000','status' => 'Active','created_at' => '2021-08-29 08:00:00','updated_at' => '2021-10-24 10:02:15'),
  array('id' => '2','name' => 'producty','stok' => '20','kode' => 'P-01','harga1' => '0','harga2' => '0','harga3' => '0','status' => 'inActive','created_at' => NULL,'updated_at' => '2021-10-24 10:03:40'),
  array('id' => '3','name' => 'product3','stok' => '10','kode' => 'P-03','harga1' => '0','harga2' => '0','harga3' => '0','status' => 'inActive','created_at' => NULL,'updated_at' => '2021-10-24 10:05:38')
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
  array('id' => '1','idsupplier' => '2','idproduct' => '1','price' => '75000','status' => 'Active','created_at' => '2021-09-02 15:11:17','updated_at' => '2021-10-23 23:11:49'),
  array('id' => '4','idsupplier' => '1','idproduct' => '2','price' => '50000','status' => NULL,'created_at' => NULL,'updated_at' => NULL),
  array('id' => '7','idsupplier' => '1','idproduct' => '1','price' => '30000','status' => 'active','created_at' => NULL,'updated_at' => NULL)
);

/* `sumberbaru`.`supplier_product_log` */
$supplier_product_log = array(
  array('id' => '1','idsupplierproduct' => '1','price' => '10000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 00:00:00'),
  array('id' => '2','idsupplierproduct' => '4','price' => '50000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 00:00:00'),
  array('id' => '3','idsupplierproduct' => '7','price' => '30000','created_at' => '2021-10-23 00:00:00','updated_at' => '2021-10-23 00:00:00'),
  array('id' => '4','idsupplierproduct' => '1','price' => '30000','created_at' => '2021-10-23 23:11:24','updated_at' => '2021-10-23 23:11:24'),
  array('id' => '5','idsupplierproduct' => '1','price' => '75000','created_at' => '2021-10-23 23:11:49','updated_at' => '2021-10-23 23:11:49')
);

/* `sumberbaru`.`transaction_return` */
$transaction_return = array(
);

/* `sumberbaru`.`users` */
$users = array(
);
