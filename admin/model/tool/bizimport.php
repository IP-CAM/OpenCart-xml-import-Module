<?php
class ModelToolBizimport extends Model {

	//Called by controler to do actual dtabase operations and import based on XML Data
	public function importData($xml_products, $model_catalog_product) {
		try{
			//
			//Impl code
			//
		}
		catch (Exception $e) {
    		$biz_products = FALSE;
			$this->session->data['error'] = "Caught exception: ".$e->getMessage(). "<br>";
		}
		return $xml_products;
	}
}
?>