<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.3
 */

/**
 * Database `sumberbaru`
 */

/* `sumberbaru`.`failed_jobs` */
$failed_jobs = array(
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
  array('id' => '8','migration' => '2021_09_05_120922_stok_log','batch' => '1')
);

/* `sumberbaru`.`password_resets` */
$password_resets = array(
);

/* `sumberbaru`.`product` */
$product = array(
  array('id' => '1','name' => 'product1','stok' => '0','kode' => 'xxx','harga1' => '0','harga2' => '0','harga3' => '0','created_at' => '2021-08-29 08:00:00','updated_at' => '2021-09-05 15:58:37'),
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
